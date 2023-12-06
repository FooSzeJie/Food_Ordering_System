@extends('backend.admin-layout')
@section('backend-section')

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Latest compiled and minified CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}

    <!-- Optional theme -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> --}}

    <!-- Latest compiled and minified JavaScript -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}

    {{-- Add On Area --}}
    {{-- add new Add On --}}
    @include('backend.component.add-on.addAddOnModal')

    {{-- edit new Variant --}}
    @include('backend.component.add-on.editAddOnModal')

    {{-- show all Variant --}}
    <div class="container">

        {{-- <div id="map" style="height: 400px;"></div><br> --}}

        <div class="row">
            <div class="col-12">

                <h3>Add On</h3>

                {{-- Search Resort Function --}}
                {{-- <form action="{{ route('HotelSearch') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-white small m-2" name="name" placeholder="Search for Name" aria-label="Search" aria-describedby="basic-addon2">
                        <input type="text" class="form-control bg-white small m-2" name="country" placeholder="Search for Country" aria-label="Search" aria-describedby="basic-addon2">
                        <input type="text" class="form-control bg-white small m-2" name="state" placeholder="Search for State" aria-label="Search" aria-describedby="basic-addon2">
                        <input type="text" class="form-control bg-white small m-2" name="address" placeholder="Search for Address" aria-label="Search" aria-describedby="basic-addon2">
                        <input type="text" class="form-control bg-white small m-2" name="type" placeholder="Search for Type" aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary pb-2"><i class="fas fa-search fa-sm"></i></button>
                        </div>
                    </div>
                </form> --}}

                <div class="data_table">

                    @if (\Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif

                    @if (\Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <!-- Button to delete all selected items -->
                    <form action="{{ route('mutlipledeleteaddon') }}" method="post" id="deleteMultipleForm">
                        @csrf
                        <!-- Your table code here -->
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">
                                {{-- Button to delete all selected items --}}
                                <button type="submit" class="btn btn-danger m-1" id="deleteAllSelectedRecord">Delete All Selected Add On</button>
                                {{-- Add Variant --}}
                                <button type="button" class="btn btn-info m-1" data-toggle="modal" data-target="#addonModal">Add On Modal</button>
                                <!-- Import Variant Model -->
                                <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#addonexcelModal">Import Add On</button>
                                {{-- Export Variant --}}
                                <a href=""><button type="button" class="btn btn-primary m-1">Export Add On</button></a>
                                {{-- Variant Excel Template --}}
                                <a href=""><button type="button" class="btn btn-dark m-1">Add On Excel Template</button></a>

                                <thead class="table-dark">
                                    <tr>
                                        <th><input type="checkbox" name="" id="select_all_ids" onclick="checkAll(this)"></th>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($addons !== 0 && count($addons) > 0)
                                        @foreach($addons as $addon)
                                            <tr>
                                                <td><input type="checkbox" name="ids" class="checkbox_ids" id="" value="{{ $addon->id }}"></td>
                                                <td>{{ $addon->id }}</td>
                                                <td>{{ $addon->name }}</td>
                                                <td>RM&nbsp;{{ $addon->price }}</td>
                                                <td>
                                                    @if ($addon->status == 0)
                                                        <a href="{{ url('changeaddon-status/' . $addon->id) }}"
                                                            class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure you want to change this status to close?')">InActive</a>
                                                    @else
                                                        <a href="{{ url('changeaddon-status/' . $addon->id) }}"
                                                            class="btn btn-sm btn-success"
                                                            onclick="return confirm('Are you sure you want to change this status to open?')">Active</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addoneditModal{{ $addon->id }}"><i class="fa fa-edit"></i></a>
                                                    <a onclick="return confirm('Are you sure to delete this data?')" href="{{ url('admin/deleteAddOn/'.$addon->id).'/delete' }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="9">No Variant Found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </form>
                    <!-- Pagination links -->
                    {{-- {{ $variants->links() }} --}}
                </div>
            </div>
        </div>
    </div>

    {{-- New Delete Selected All Table --}}
    <script>
        // Function to check/uncheck all checkboxes
        function checkAll(checkbox) {
            const checkboxes = document.getElementsByClassName('checkbox_ids');
            for (const cb of checkboxes) {
                cb.checked = checkbox.checked;
            }
        }

        document.getElementById('deleteAllSelectedRecord').addEventListener('click', function() {
            const checkboxes = document.getElementsByClassName('checkbox_ids');
            const selectedIds = [];

            for (const checkbox of checkboxes) {
                if (checkbox.checked) {
                    selectedIds.push(parseInt(checkbox.value));
                }
            }

            if (selectedIds.length === 0) {
                alert('Please select at least one restaurant to delete.');
            } else {
                const form = document.getElementById('deleteMultipleForm');
                const idsInput = document.createElement('input');
                idsInput.type = 'hidden';
                idsInput.name = 'ids';
                idsInput.value = JSON.stringify(selectedIds);
                form.appendChild(idsInput);

                form.submit();
            }
        });
    </script>

    {{-- Read Excel File Data JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>

    {{-- Read Category Excel File Data --}}
    <script>
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
    </script>

    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection
