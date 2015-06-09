$(function(){

	var table=	$("#couponTable").DataTable({"bDestroy" : true,
                "aLengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]],
                "iDisplayLength": 5});


  $('#subcategory').prop('disabled', true);

  getAllCompany();


  getAllCategories();



  

  $("#searchBtn").click(function(){
    window.location.hash = "#search";
    $.ajax({
      url: "search.php", 
      data: {couponType: $("#couponType").val(), websiteTitle:$("#stores").val(),Category:$("#category").val(),CouponCode: $("#search").val(), SubCategory:$("#subcategory").val(),searchType: "filter"},
      success: function(result){


        $('#couponTable').dataTable().fnClearTable();

        $('#couponTable').dataTable().fnDestroy();
        $('#couponTable').empty();
        $('#couponTable').append("<thead></thead>");
        $('#couponTable > thead').append("<tr></tr>");

        $('#couponTable > thead > tr').append("<th>Coupon Code</th> <th>Description</th> <th>Company</th>");
        $('#couponTable').append("<tbody></tbody>");
        

         res=JSON.parse(result);
        $.each(res,function(index,value){
          $("#couponTable > tbody").append("<tr><td>"+res[index].CouponCode+"</td><td>"+res[index].Description+"</td><td>"+res[index].WebsiteID+"</td></tr>");

        });



        $("#couponTable").DataTable({"bDestroy" : true,
                "aLengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]],
                "iDisplayLength": 5});

      }

    });
  });


  $("#couponType").on("change",function(){
    window.location.hash = "#coupontype_filter";
    showFilters();

    filterFunction();

  });


  $("#stores").on("change",function(){

    window.location.hash = "#store_filter";
     showFilters();
    filterFunction();
    if($("#stores").val()==""){
  getAllCategories();

    }
      else{
    $.ajax({
    url: "search.php", 
    data: {searchType: "getAllCategoriesBy", company:$("#stores").val() },
    success: function(result){
       $('#category').find('option:gt(0)').remove();
      res=JSON.parse(result);
      $.each(res,function(index,value){  

        $("#category").append("<option value='"+res[index].categoryId+"'>"+res[index].Name+"("+res[index].couponCount+")</option>");

      });

    }

  });
  }



  });


  $("#category").on("change",function(){

    window.location.hash = "#category_filter";
     showFilters();
    $('#subcategory').find('option:gt(0)').remove();
    filterFunction();

     $.ajax({
    url: "search.php", 
    data: {searchType: "getAllSubCategories", categoryId: $("#category").val()},
    success: function(result){
      
      res=JSON.parse(result);

      $.each(res,function(index,value){  

        $("#subcategory").append("<option value='"+res[index].SubCategoryId+"'>"+res[index].SubCategory+"</option>");

      });
       $('#subcategory').prop('disabled', false);

    }

  });


  });

   $("#subcategory").on("change",function(){
    window.location.hash = "#subcategory_filter";
     showFilters(); 
     filterFunction();

  });



  





});


 function showFilters(){


      $("#filters").empty();
      if($("#subcategory option:selected").val()!="") {
          
          $("#filters").append("<span>"+$("#subcategory option:selected").text()+"<button onclick='resetFilters($(this),\"#subcategory\");'>X</button></span>");
   
      }
       if($("#category option:selected").val()!="") {
          
          $("#filters").append("<span>"+$("#category option:selected").text()+"<button onclick='resetFilters($(this),\"#category\");'>X</button></span>");
   
      }
       if($("#stores option:selected").val()!="") {
          
           $("#filters").append("<span>"+$("#stores option:selected").text()+"<button onclick='resetFilters($(this),\"#stores\");'>X</button></span>");
    
   
      }
        if($("#couponType option:selected").val()!="") {

          
           $("#filters").append("<span>"+$("#couponType option:selected").text()+"<button onclick='resetFilters($(this),\"#couponType\");'>X</button></span>");
    
   
      }

   }

   function resetFilters(element,selectElement){



      element.parent().remove();
      $(selectElement).val("");
      if(selectElement=="#category") {
          $("#subcategory").prop("disabled",true);
          $("#subcategory").val("");
          showFilters();             
      }
      filterFunction();


   }

   function filterFunction() {


    $.ajax({
      url: "search.php", 
      data: {couponType: $("#couponType").val(), websiteTitle:$("#stores").val(),CouponCode: $("#search").val(),Category:$("#category").val(), SubCategory:$("#subcategory").val(), searchType: "filter"},
      success: function(result){

        $('#couponTable').dataTable().fnClearTable();

        $('#couponTable').dataTable().fnDestroy();
        $('#couponTable').empty();
        $('#couponTable').append("<thead></thead>");
        $('#couponTable > thead').append("<tr></tr>");

        $('#couponTable > thead > tr').append("<th>Coupon Code</th> <th>Description</th> <th>Company</th>");
        $('#couponTable').append("<tbody></tbody>");
        
        

        res=JSON.parse(result);
        $.each(res,function(index,value){
          $("#couponTable > tbody").append("<tr><td>"+res[index].CouponCode+"</td><td>"+res[index].Description+"</td><td>"+res[index].WebsiteID+"</td></tr>");

        });



       $("#couponTable").DataTable({"bDestroy" : true,
                "aLengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]],
                "iDisplayLength": 5});

      }

    });
  }

  function getAllCategories(){

    $.ajax({
    url: "search.php", 
    data: {searchType: "getAllCategories"},
    success: function(result){

      res=JSON.parse(result);
      $.each(res,function(index,value){  

        $("#category").append("<option value='"+res[index].categoryId+"'>"+res[index].Name+"("+res[index].couponCount+")</option>");

      });

    }

  });
  }

  function getAllCompany(){


  $.ajax({
    url: "search.php", 
    data: {searchType: "getAllCompany"},
    success: function(result){

      res=JSON.parse(result);
      $.each(res,function(index,value){  

        $("#stores").append("<option value="+res[index].WebsiteName+">"+res[index].WebsiteName +"("+res[index].couponCount+")</option>");

      });

    }

  });

  }


