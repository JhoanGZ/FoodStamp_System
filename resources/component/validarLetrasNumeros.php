
<script>
    function ValidaSoloNumeros(){
        if((event.keyCode < 40) || (event.keyCode > 57))
            event.returnValue = false;    
    } 
    function ValidaSoloLetras(){
        if((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
        event.returnValue = false;
    }
</script>