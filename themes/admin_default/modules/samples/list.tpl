<!-- BEGIN: main -->
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr class="text-center">
                <th class="text-nowrap">STT</th>
                <th class="text-nowrap">Họ tên</th>
                <th class="text-nowrap">Mail</th>
                <th class="text-nowrap">Số điện thoại</th>
                <th class="text-nowrap">Giới tính</th>
                <th class="text-nowrap">Địa chỉ</th>
                <th class="text-center text-nowrap">Chức năng</th>

            </tr>
        </thead>
        <tbody>
            <!-- BEGIN: loop -->
            <tr>
                <td class="text-center">{ROW.stt}</td>
                <td class="text-center">{ROW.fullname}</td>
                <td class="text-center">{ROW.email}</td>
                <td class="text-center">{ROW.phone}</td>
                <td class="text-center">{ROW.gender}</td>
                <td class="text-center">{ROW.address}</td>
                <td class="text-center text-nowrap">
                    <a href="{ROW.url_edit}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i>Sửa</a>
                    <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                </td>

            </tr>
            <!-- END: loop -->
        </tbody>
    </table>
</div>
<!-- END: main -->