<script>
    $(function() {

        $("body").on("ifChecked", "input:radio[name='values[c_type]']", function() {
            $('input[name="values[c_key]"]').val(this.value ? this.value + '.new_key_here' : '');
        });

        if (!$('input.do').val()) {
            $("body").on("click", ".nav.nav-tabs li", function() {
                var index = $(".nav.nav-tabs li").index(this);
                $("input[name='tabindex']").val(index);
            });

            var index = $(".nav.nav-tabs li").index($(".nav.nav-tabs li.active"));
            var _index = $("input[name='tabindex']").val();
            if (index != _index) {
                $(".nav.nav-tabs li").eq(_index).find("a").trigger('click');
            }
        }

        $(".checkbox-inline,.radio-inline").css('margin-left', '0');
    });
</script>
