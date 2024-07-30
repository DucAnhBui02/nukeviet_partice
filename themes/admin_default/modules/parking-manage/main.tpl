<!-- BEGIN: main -->
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr class="text-center">
                <th class="text-center text-nowrap">STT</th>
                <th class="text-center text-nowrap">Loại phương tiện</th>
                <th class="text-center text-nowrap">Biển số</th>
                <th class="text-center text-nowrap">Họ và tên chủ xe</th>
                <th class="text-center text-nowrap">Ghi chú khác</th>
                <th class="text-center text-nowrap">Chức năng</th>

            </tr>
        </thead>
        <tbody>
            <!-- BEGIN: loop -->
            <tr>
                <td class="text-center">{ROW.id}</td>
                <td class="text-center">{ROW.parking_type}</td>
                <td class="text-center">{ROW.license_plate}</td>
                <td class="text-center">{ROW.name}</td>
                <td class="text-center">{ROW.others_note}</td>
                <td class="text-center text-nowrap">
                    <a href="{ROW.url_edit}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i>Sửa</a>
                    <a href="{ROW.url_delete}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash-o"></i>Xóa</a>
                </td>

            </tr>
            <!-- END: loop -->
        </tbody>
    </table>
</div>
<!-- END: main -->