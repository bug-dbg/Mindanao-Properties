var my_handlers = {
    fill_provinces:  function(){
        var region_code = $(this).val();
        $('#province').ph_locations('fetch_list', [{"region_code": region_code}]);
        
    },
    fill_cities: function(){
        var province_code = $(this).val();
        $('#city').ph_locations( 'fetch_list', [{"province_code": province_code}]);
    },
    fill_barangays: function(){
        var city_code = $(this).val();
        $('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
    }
  };
  $(function(){
      $('#region').on('change', my_handlers.fill_provinces);
      $('#province').on('change', my_handlers.fill_cities);
      $('#city').on('change', my_handlers.fill_barangays);
      $('#region').ph_locations({'location_type': 'regions'});
      $('#province').ph_locations({'location_type': 'provinces'});
      $('#city').ph_locations({'location_type': 'cities'});
      $('#barangay').ph_locations({'location_type': 'barangays'});
      $('#region').ph_locations('fetch_list');
  });
  $(function(){
      // whenever the region dropdown change, update the value of hidden field
      $('#region').on('change', function(){
          // we are getting the text() here, not val()
          var selected_caption = $("#region option:selected").text();
          // the hidden field will contain the name of the region, not the code
          $('input[name=region]').val(selected_caption);
      }).ph_locations('fetch_list');
  });
  $(function(){
      // whenever the region dropdown change, update the value of hidden field
      $('#province').on('change', function(){
          // we are getting the text() here, not val()
          var selected_caption = $("#province option:selected").text();
          // the hidden field will contain the name of the region, not the code
          $('input[name=province]').val(selected_caption);
      }).ph_locations('fetch_list');
  });
  $(function(){
      // whenever the region dropdown change, update the value of hidden field
      $('#city').on('change', function(){
          // we are getting the text() here, not val()
          var selected_caption = $("#city option:selected").text();
          // the hidden field will contain the name of the region, not the code
          $('input[name=city]').val(selected_caption);
      }).ph_locations('fetch_list');
  });
  $(function(){
      // whenever the region dropdown change, update the value of hidden field
      $('#barangay').on('change', function(){
          // we are getting the text() here, not val()
          var selected_caption = $("#barangay option:selected").text();
          // the hidden field will contain the name of the region, not the code
          $('input[name=barangay]').val(selected_caption);
          
      }).ph_locations('fetch_list');
  });