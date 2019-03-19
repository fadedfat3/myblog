@if (Session::has('success'))
    <div class="alert alert-success" style="position:fixed;top:20px;right:20px;height:auto;width:400px">
        <button type="button" class="close" data-dismiss="alert" id="success_info_click_auto">×</button>
        <strong>
            <i class="fa fa-check-circle fa-lg fa-fw"></i> 成功. 
        </strong>
        <p class="center">{{ Session::get('success') }}</p>
    </div>
    <script>
            var auto_close = function(){
                $('#success_info_click_auto').click();
            };
            setTimeout(auto_close, 5000);
    </script>
@endif

    
