document.addEventListener('DOMContentLoaded', function () {
    // 获取文件输入框和模态框内容区域的元素
    const fileInput = document.querySelector('#hotelexcelModal input[type="file"]');
    const modalBody = document.querySelector('#hotelexcelModal .modal-body');

    // 为文件输入框添加事件监听，当用户选择了文件后触发
    fileInput.addEventListener('change', function (event) {
        // 获取用户选择的文件
        const selectedFile = event.target.files[0];

        if (selectedFile) {
            // 创建一个文件阅读器对象
            const fileReader = new FileReader();

            // 当文件加载完成时，会执行这个回调函数
            fileReader.onload = function (e) {
                // 获取文件的内容（以二进制形式）
                const data = e.target.result;

                // 使用 XLSX 库将二进制内容解析成工作簿对象
                const workbook = XLSX.read(data, { type: 'binary' });

                // 假设你使用第一个工作表名字
                const sheetName = workbook.SheetNames[0];

                // 将工作表的数据解析成 JSON 格式
                const sheetData = XLSX.utils.sheet_to_json(workbook.Sheets[sheetName], { header: 1 });

                // 创建一个 HTML 表格元素
                const table = document.createElement('table');
                table.classList.add('table', 'table-bordered');

                // 循环遍历数据，创建表格行和单元格
                for (let i = 0; i < sheetData.length; i++) {
                    const row = document.createElement('tr');
                    for (let j = 0; j < sheetData[i].length; j++) {
                        const cell = document.createElement(i === 0 ? 'th' : 'td');
                        cell.textContent = sheetData[i][j];
                        row.appendChild(cell);
                    }
                    table.appendChild(row);
                }

                console.log(sheetData);

                // 将表格添加到模态框内容区域中
                modalBody.appendChild(table);
            };

            // 开始读取文件内容（以二进制字符串形式）
            fileReader.readAsBinaryString(selectedFile);
        }
    });
});
