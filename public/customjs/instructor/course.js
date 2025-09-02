$(document).ready(function() {
    $('#name').on('input', function() {
        var name = $(this).val();
        var slug = name.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
        $('#slug').val(slug);
    });
});


// Dynamic dependent jquery. To fetch subcategories according to its parent category

$(document).ready(function(){
    $('#category').on('change', function(){

        var categoryId = $(this).val();

        if(categoryId){
            $.ajax({
                url: '/instructor/get-subcategories/' + categoryId,
                type: 'GET',

                headers: {
                    'X_CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') //Dynamically fetch CSRF token
                },

                success: function(data){
                    console.log(data);
                    $('#subcategory').empty(); // Clear previous selection
                    $('#subcategory').append('<option value="" disabled selected>Select a subcategory</option>');

                    $.each(data, function(key, value){
                        $('#subcategory').append('<option value=" '+ parseInt(value.id) + ' ">'+ value.name + '</option>')
                    });
                },

                error: function(){
                    alert('Failed to load subcategories')
                }
            });
        }else{
            $('#subcategory').empty();
            $('#subcategory').append('<option value="" disabled selected >Select a Subcategory</option>')
        }

    });
});


// Course goal script
$(document).ready(function(){
    $('#addGoalInput').on('click', function(e){
        e.preventDefault(); //Prevent default behaviour

        $('#goalContainer').append(`
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                <input type="text" class="form-control" name="course_goals[]" placeholder="Enter the course goal" id="">
                <button type="button" class="btn btn-danger removeGoalInput">-</button>
            </div>
        `);

    });

    //Remove input field
    $(document).on('click', '.removeGoalInput', function(){
        $(this).closest('div').remove();
    });

});
