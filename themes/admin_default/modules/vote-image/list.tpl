<!-- BEGIN: main -->
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr class="text-center">
                <th class="text-center text-nowrap">STT</th>
                <th class="text-center text-nowrap">Họ tên</th>
                <th class="text-center text-nowrap">Email</th>
                <th class="text-center text-nowrap">Số điện thoại</th>
                <th class="text-center text-nowrap">Giới tính</th>
                <th class="text-center text-nowrap">Địa chỉ</th>
                <th class="text-center text-nowrap">Kích hoạt</th>
                <th class="text-center text-nowrap">Chức năng</th>

            </tr>
        </thead>
        <tbody>
            <!-- BEGIN: loop -->
            <tr>
                <td class="text-center">
                    <select name="weight" class="form-control weight_{ROW.id}" onchange="nv_change_weight({ROW.id})">
                        <!-- BEGIN: weight -->
                        <option value="{J}" {J_SELECT}>{J}</option>
                        <!-- END: weight -->
                    </select>
                </td>
                <td class="text-center">{ROW.fullname}</td>
                <td class="text-center">{ROW.email}</td>
                <td class="text-center">{ROW.phone}</td>
                <td class="text-center">{ROW.gender}</td>
                <td class="text-center">{ROW.address}</td>
                <td class="text-center">
                    <input type="checkbox" name="active" {ROW.active} onchange="nv_change_active('ROW.id')" />
                </td>
                <td class="text-center text-nowrap">
                    <a href="{ROW.url_edit}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i>Sửa</a>
                    <a href="{ROW.url_delete}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash-o"></i>Xóa</a>
                </td>

            </tr>
            <!-- END: loop -->
        </tbody>
    </table>
    {GENERATE}
</div>
<script>
    function nv_change_weight(id) {
        var new_weight = $('.weight_' + id).val();

        $.ajax({
            url: script_name + '?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=list&change_weight=1&id=' + id + '&new_weight=' + new_weight,
            success: function (result) {
                if (result != "ERR") {
                    location.reload();
                }
            }
        });
    }
    function nv_change_active(id) {
        $.ajax({
            url: script_name + '?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=list&action_active=2&id' + id,
            success: function (result) {
                if (result == "ERR") {
                    alert('error unvalid');
                    location.reload();
                }
            }
        });
    }
    $(document).ready(function () {
        $('.delete').click(function () {
            if (confirm("Bạn có muốn xóa")) {
                return true;
            } else {
                return false;
            }
        })
    });
</script>
<!-- END: main -->