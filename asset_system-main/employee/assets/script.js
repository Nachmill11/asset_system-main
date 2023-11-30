$(function(){
    var provinceObject = $('#province');
    var amphureObject = $('#amphure');

    // on change province
    provinceObject.on('change', function(){
        var provinceId = $(this).val();

        amphureObject.html('<option value="">-เลือกหมวดหมู่ครุภัณฑ์-</option>');

        $.get('get_amphure.php?province_id=' + provinceId, function(data){
            var result = JSON.parse(data);
            $.each(result, function(index, item){
                amphureObject.append(
                    $('<option></option>').val(item.c_id).html(item.c_name)
                );
            });
        });
    });
});