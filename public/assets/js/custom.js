$(document).ready(function() {
        $('#state-dropdown').on('change', function() {
          var state_id = this.value;
          $("#city-dropdown").html('');
          $.ajax({
            url: "{{url('get-cities-by-state')}}",
            type: "POST",
            data: {
              state_id: state_id,
              _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
              $('#city-dropdown').html('undefined<option value="">Select City</option>');
              $.each(result.cities, function(key, value) {
                $("#city-dropdown").append('undefined<option value="' + value.id + '">' + value.name + '</option>');
              });
            }
          });
        });
      });
