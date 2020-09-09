Help
<div class="row">
    <div class="col-sm-12">
        Common options:
        <pre>
divide : after
//&lt;hr&gt; befor or after this element.
</pre>
        Common Methods:
        <pre>
@rules : required|min:3|max:12
@setWidth : 6, 2
//etc..
//@methodname : arg1, arg2 ...
//suported args types [string/integer/folat/boolean]
</pre>
    </div>
    <div class="elem normal_elem col-sm-12">
        Replace default element:
        <pre>
__element__ : mobile
//__element__ : ip
//__element__ : url
//__element__ : email
//__element__ : currency
//etc..
</pre>
        Extend element:
        <pre>
__element__ : test_text

//Extend element in Admin/bootstrap.php :
Form::extend('new_element', App/Admin/Extensions/NewElement::class);
//Useage
__element__ : new_element
</pre>
    </div>
    <div class="elem group_elem col-sm-12">Use texts
        <pre>
text1
text2
...
</pre>
        Or key-texts
        <pre>
key1 : text1
key2 : text2
...
</pre>
    </div>
    <div class="elem select_elem col-sm-12">
        Or load data from url:
        <pre>
//Options:
options_url : /admin/api/mydata
//Or methods:
@options : /admin/api/mydata
</pre>
    </div>
    <div class="elem textarea_elem col-sm-12">
        <pre>
//Options:
rows : 5
//Or methods:
@rows : 5
</pre>
    </div>
    <div class="elem number_elem col-sm-12">
        <pre>
//Options:
max : 100
min : 1
//Or methods:
@max : 100
@min : 1
</pre>
    </div>
    <div class="elem editor_elem col-sm-12">
        <pre>editor_name : editor </pre>
    </div>
    <div class="elem color_elem col-sm-12">
        <pre>
//Options:
format : rgba
//color format can be : [hex, rgb, rgba]
//Or methods:
@hex
@rgb
@rgba

</pre>
    </div>
    <div class="elem image_elem col-sm-12">
        //Image Methods:
        <pre>
@uniqueName
@sequenceName
@removable
@move : newdir, newname
@dir : newdir
@name : newname
@resize : 320, 240
@insert : storage/public/watermark.png ,center
@crop : 320, 240, 0, 0
//etc..
</pre>
        //Some methods require intervention/image <a href="http://image.intervention.io/getting_started/installation" target="_blank">[installation]</a>
        <br />
        //Usage : <a href="http://image.intervention.io/getting_started/introduction" target="_blank">[Intervention]</a>
    </div>
    <div class="elem file_elem col-sm-12">
        //File Methods:
        <pre>
@uniqueName
@sequenceName
@removable
@move : newdir, newname
@dir : newdir
@name : newname
//etc..
</pre>
    </div>
    <div class="elem map_elem col-sm-12">
        <pre>
//To use map ,you need to edit configs first.
//map_provider in /config/admin.php
//TENCENT_MAP_API_KEY or GOOGLE_API_KEY in /.env
</pre>
    </div>
    <div class="elem table_elem col-sm-12">
        <pre>
rows : 3
cols : 3
</pre>
        <span style="text-align:right;" class="btn btn-success" onclick="createTable();">Build table</span>
        <div class="row" id="table-div" style="margin-top:10px;">

        </div>
        <code style="visibility:hidden;" id="field-tip">&nbsp;</code>
    </div>
    <textarea class="hidden" id="saved-table">{{ json_encode($table) }}</textarea>
</div>
<script>
    var buildGrid = {};
    var builded = false;

    $(function() {
        $("body").on("ifChecked", "input:radio[name='values[c_element]']", function() {
            typeChange(this.value);
        });

        $("body").on("keyup", "input.table-field", function() {
            buildGrid[$(this).attr('data-key')] = $(this).val();
            getTdType($(this));
        });

        $("body").on("focus", "input.table-field", function() {
            getTdType($(this));
        });

        typeChange($("input:radio[name='values[c_element]']:checked").val());

        var saved_table = $('#saved-table').val();
        if (/^\{.+\}$/.test(saved_table)) {
            buildGrid = JSON.parse(saved_table) || {};
            createTable();
        }
    });

    function getTdType(el) {
        var key = el.attr('data-key');
        var val = el.val();
        $('#field-tip').css('visibility', 'visible');
        if (key == val || val == '') {
            $('#field-tip').html(key + '&nbsp;:&nbsp;render as input element.');
            el.css('color', '#666');
        } else {
            $('#field-tip').html(key + '&nbsp;:&nbsp;just show text \"' + val + '\".');
            el.css('color', '#000');
        }
    }

    function typeChange(value) {
        $('div.elem').addClass('hidden');
        if (value == 'radio_group' || value == 'checkbox_group' || value == 'select' || value == 'multiple_select' ||
            value == 'listbox') {
            $('.group_elem').removeClass('hidden');
            if (value == 'select' || value == 'multiple_select') {
                $('.select_elem').removeClass('hidden');
            } else {
                $('.select_elem').addClass('hidden');
            }
        } else if (value == 'textarea') {
            $('.textarea_elem').removeClass('hidden');
        } else if (value == 'number') {
            $('.number_elem').removeClass('hidden');
        } else if (value == 'color') {
            $('.color_elem').removeClass('hidden');
        } else if (value == 'table') {
            $('.table_elem').removeClass('hidden');
            if(!builded)
            {
                $("button[type='submit']").attr('disabled','disabled');
            }
        } else if (value == 'editor') {
            $('.editor_elem').removeClass('hidden');
        } else if (value == 'image' || value == 'multiple_image') {
            $('.image_elem').removeClass('hidden');
        } else if (value == 'file' || value == 'multiple_file') {
            $('.file_elem').removeClass('hidden');
        } else if (value == 'map') {
            $('.map_elem').removeClass('hidden');
        } else if (value == 'normal') {
            $('.normal_elem').removeClass('hidden');
        }
    }

    function createTable() {
        var text = $("textarea[name='values[c_options]']").val();
        if (text == '') {
            text = "rows : 3\ncols : 3";
            $("textarea[name='values[c_options]']").val(text);
        }
        var arr = text.split(/[\r\n]/);
        if (arr.length > 1) {
            var cols = 0;
            var rows = 0;
            var k = '';
            var v = '';
            var kv = [];
            var text = '';

            for (var i in arr) {
                if (cols && rows) {
                    break;
                }
                text = arr[i].trim();
                if (!text) {
                    continue;
                }
                kv = text.split(':');
                if (kv.length == 2) {
                    k = kv[0].trim();
                    v = kv[1].trim();
                    if (k == 'cols') {
                        cols = parseInt(v);
                    }
                    if (k == 'rows') {
                        rows = parseInt(v);
                    }
                }
            }
            if (cols < 3 || rows < 3) {
                alert('cols >= 3, rows >= 3');
                return;
            }
            build(rows, cols);
        }
    }

    function build(rows, cols) {
        var html = '<table class="table" style="border:1px solid #999;width:97%;margin:12px;">';
        $key = $("input[name='values[c_key]']").val();
        if (!$key) {
            $("input[name='values[c_key]']").focus();
            return;
        }
        var tdstyle =
            'width:100%;height:100%;border:none;border-bottom:1px solid #c1c1c1;text-align:center;';
        for (var i = 0; i < rows; i += 1) {
            html += '<tr>';
            for (var j = 0; j < cols; j += 1) {
                var fieldKey = $key + '_' + i + '_' + j;
                if (!buildGrid[fieldKey]) {
                    if (i == 0 && j == 0) {
                        buildGrid[fieldKey] = 'r_label\\c_label';
                    } else if (i == 0) {
                        buildGrid[fieldKey] = 'c_label' + j;
                    } else if (j == 0) {
                        buildGrid[fieldKey] = 'r_label' + i;
                    } else {
                        buildGrid[fieldKey] = '';
                    }
                }

                if (fieldKey == buildGrid[fieldKey]) {
                    var style = tdstyle + 'color:#666;';
                } else {
                    var style = tdstyle + 'color:#000;';
                }
                html += '<td style="border:1px solid #999;"><input data-key="' + fieldKey +
                    '" class="table-field" style="' + style +
                    '" name="table[' +
                    fieldKey +
                    ']" type="text" value="' + buildGrid[fieldKey] + '" placeholder="' + fieldKey + '" /></td>';
            }
            html += '</t>';
        }
        $('#table-div').html(html);
        builded = true;
        $("button[type='submit']").removeAttr('disabled');
    }
</script>
