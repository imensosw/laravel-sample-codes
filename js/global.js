function nestedDropdown(that,urlText,targetId,lavel,groupClass,firstOption='Please Select',selected='')
{
	var that = that ;
	var targetId = targetId ;
    for(i = lavel ; 0 < i ; i-- )
    {
        $('.'+groupClass+i).empty();
        $('.'+groupClass+i).trigger('chosen:updated');
    }

    if($(that).val()) 
    {
        $.ajax({
            url: urlText+"/"+$(that).val() ,
            type: "GET",
            dataType: "json",
            success:function(data) {
                if(targetId != '')
                {
                    $('#'+targetId).empty();

                    if(firstOption != "NA")
                    {
                        $('#'+targetId).append('<option value="">'+firstOption+'</option>'); 
                    }
                    
                    $.each(data, function(key, value) {
                        $('#'+targetId).append('<option value="'+ key +'">'+ value +'</option>'); 
                    });
                    $('#'+targetId).trigger('chosen:updated');
                }
                else
                {
                    var dropdown = $(that).nextAll("select:first");
                    dropdown.empty();
                    dropdown.append('<option value="">'+firstOption+'</option>'); 
                    $.each(data, function(key, value) {
                        dropdown.append('<option value="'+ key +'">'+ value +'</option>'); 
                    });
                    dropdown.trigger('chosen:updated');
                }
            }
        });
    }
    else
    {
        $('#'+targetId).empty();
        $('#'+targetId).trigger('chosen:updated');
    }
}