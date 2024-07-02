<!-- BEGIN: main -->
    <form action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
        <div class="form-group row">
            <div class="col-md-4">
                <label><strong>Họ tên</strong></label>
            </div>
            <div class="col-md-20">
                <input type="text" class="form-control name="fullname" value={POST.fullname}/>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <label><strong>Email</strong></label>
            </div>
            <div class="col-md-20">
                <input type="text" class="form-control name="email" value={POST.email}/>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <label><strong>Số điện thoại</strong></label>
            </div>
            <div class="col-md-20">
                <input type="text" class="form-control name="phone" value={POST.phone}/>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <label><strong>Giới tính</strong></label>
            </div>
            <div class="col-md-20">
                <input type="radio" class="form-control name="gender" value="0"/> Nam
                <input type="radio" class="form-control name="gender" value="1"/> Nữ
                <input type="radio" class="form-control name="gender" value="2"/> N/A
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <label><strong>Địa Chỉ</strong></label>
            </div>
            <div class="col-md-20 form-inline">
                <select class="form-control" name="provide">
                    <option value="0">Chọn tỉnh</option>
                    <option value="1">Hà Nội</option>
                    <option value="2">Hà Nam</option>
                </select>
                <select class="form-control" name="district">
                    <option value="0">Chọn Huyện</option>
                </select>
            </div>
        </div>
        <div class="text-center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
    </form>
<!-- END: main -->