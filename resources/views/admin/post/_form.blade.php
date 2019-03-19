<script>
    function readMarkdownFile() {
            var files = $('#markdown_filepath').prop('files');
            var filepath = $('#markdown_filepath').val();
           // debugger;
            if(files.length == 0 || !/\.md$/.test(filepath)){
                alert('请选择Markdown文件');
            }
            var reader = new FileReader();
            reader.readAsText(files[0], 'UTF-8');
            reader.onload = function(evt){            
                var content = evt.target.result;
                alert($('#content').val());
            }
            filepath = filepath.replace(/\\/g, '/');
           
            $('#title').val(filepath.substring(filepath.lastIndexOf('/')+1, filepath.lastIndexOf('.')))
            
        }
</script>
<div class="row">
    <div class="col-md-8">
        <div class="form-group row">
            <label for="title" class="col-md-2 col-form-label">
                标题
            </label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="title" autofocus id="title" value="{{ $title }}">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="meta_description" class="col-md-2 col-form-label">
                摘要
            </label>
            <div class="col-md-10">
                <textarea class="form-control" name="meta_description" id="meta_description" rows="6">
                    {{ $meta_description }}
                </textarea>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="content" class="col-md-2 col-form-label">
                内容
            </label>
            <div class="col-md-10">
                <textarea class="form-control" name="content" rows="14" id="content">{{ $content }}</textarea>
            </div>
            @if(Request::is('admin/post/create*'))
                <label for="file" class="col-md-2 col-form-label">
                    MD文件
                </label>
                <input class="col-md-7" type='file' name="file" id="markdown_filepath">
                <button class="col-md-2" type="button" onclick="readMarkdownFile()">生成</button>
            @endif
        </div>
    </div>
    <div class="col-md-8">
       
        
        <div class="form-group row">
            <label for="tags" class="col-md-2 col-form-label">
                标签
            </label>
            <div class="col-md-10">
                <select name="tags[]" id="tags" class="form-control" multiple>
                    @foreach ($allTags as $tag)
                        <option @if (in_array($tag, $tags)) selected @endif value="{{ $tag }}">
                            {{ $tag }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-10 col-md-offset-3">
                <div class="checkbox">
                    <label>
                        <input {{ checked($is_draft) }} type="checkbox" name="is_draft">
                        存为草稿
                    </label>
                </div>
            </div>
        </div>
        

    </div>
</div>

