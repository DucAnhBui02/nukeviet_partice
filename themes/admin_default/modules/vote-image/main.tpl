<!-- BEGIN: main -->
<!-- BEGIN: error -->
<div class="alert alert-danger">
    {ERROR}
</div>
<!-- END: error -->
<form
    action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}"
    method="post">
    <input type="hidden" name="id" value="{POST.id}" />
    <div class="form-group row">
        <div class="col-md-4">
            <label><strong>Họ tên</strong></label>
        </div>
        <div class="col-md-20">
            <input type="text" class="form-control" name="fullname" value="{POST.fullname}" />
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label><strong>Email</strong></label>
        </div>
        <div class="col-md-20">
            <input type="text" class="form-control" name="email" value="{POST.email}" />
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label><strong>Số điện thoại</strong></label>
        </div>
        <div class="col-md-20">
            <input type="text" class="form-control" name="phone" value="{POST.phone}" />
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label><strong>Giới tính</strong></label>
        </div>
        <div class="col-md-20">
            <!-- BEGIN: gender -->
            <input type="radio" class="form-control" name="gender" value="{GENDER.key}"
                {GENDER.checked} />{GENDER.title}
            <!-- END: gender -->
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label><strong>Địa Chỉ</strong></label>
        </div>
        <div class="col-md-20 form-inline">
            <select class="form-control" name="provide" id="provide" onchange="changeProvide()">
                <option value="0">Chọn tỉnh</option>
                <!-- BEGIN: provide -->
                <option value="{PROVINCE.key}" {PROVINCE.selected}>{PROVINCE.title}</option>
                <!-- END: provide -->
            </select>
            <select class="form-control" name="district" id="district">
                <option value="0">Chọn Huyện</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label><strong>File:</strong></label>
        <input type="file" name="uploadfile">
    </div>
    <div class="text-center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
</form>
<script type="text/javascript">
    function changeProvide() {
        var id_provide = $("#provide").val();
        $.ajax({
            url: script_name + '?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=main&change_provide=1&id_provide' + id_provide, success: function (result) {
                if (result != "ERR") {
                    $("#district").html(result);
                }
            }
        });
    }
</script>
<!-- END: main -->