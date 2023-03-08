<br><a href='javascript:CopyClipboard("codetext");'>Скопировать в буфер обмена</a>


<script>
<!--
    function CopyClipboard(id)
    {
        var obj = document.getElementById(id);

        if (obj) {
            window.clipboardData.setData('Text', obj.value);
        }
    }
    function ChangeCode(radio)
    {
        var code = document.getElementById("code");
        var codetext = document.getElementById("codetext");
        var str = code.value;
        str = str.replace(/(php\?)(site)/, "$1it=" + radio.value + "&$2" );
        codetext.value = str;
    }
-->
</script>
