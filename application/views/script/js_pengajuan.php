<script>

$(document).ready(function() {

    $.getJSON('<?=base_url()?>assets/api-wilayah-indonesia/static/api/provinces.json',function(data){
        data.forEach(element => {
            var html = "<option value='"+element.id+"_"+element.name+"'>"+element.name+"</option>";
            $('#provinsi').append(html);
        });
    });
});

$("#tipemedia_id").change(function(e) {
    var val = $(this).val();

    if(val==2 || val == 4) {
        $("#website").attr('required',true);
    }else {
        $("#website").attr('required',false);
    }
})

$('#provinsi').change(function() {
    $('#kota').empty();
    if($(this).val()!="") {
        var splitId = $(this).val().split("_");

        $.getJSON('<?=base_url()?>assets/api-wilayah-indonesia/static/api/regencies/'+splitId[0]+'.json',function(data){
            data.forEach(element => {
                var html = "<option value='"+element.name+"'>"+element.name+"</option>";
                $('#kota').append(html);
            });
        });
    }
})




</script>