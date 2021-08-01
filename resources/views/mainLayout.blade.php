<!DOCTYPE html>
<html lang="zxx">

<head>

    @include("includes.head")

    @yield('script')
</head>

<body>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0&appId=157330463046823&autoLogAppEvents=1"
        nonce="Rb8VVvpU"></script>
    <!-- Start: Header Section -->
    @include('includes.header')
    <!-- End: Header Section -->

    <!-- Start: Page Banner -->
    {{-- except: index --}}
    @yield('bannerContainer')
    <!-- End: Page Banner -->

    <!-- content-->
    @yield('content')

    <!-- Start: Social Network -->
    @include("includes.socialNetwork")
    <!-- End: Social Network -->

    <!-- Start: Footer -->
    @include("includes.footer")
    <!-- End: Footer -->

    <!-- jQuery Latest Version 1.x -->
    @include("includes.jsLib")

    @include('sweetalert::alert')
    {{-- <script>
        function saveFavorite(id) {
            alert('ok'); 
            var userId = 'userId' + id;
            var bookId = 'bookId' + id;
            // alert(userId);
            // var data = [1, 2, 3];
            // data.push({userId:document.getElementById(userId).value});
            // data.push({bookId:document.getElementById(bookId).value});
            // data = data.serializeArray();
            alert($("#myForm :input[name=userId]"));
            $.post( $("#myForm").attr("action"), data, function(info) { alert('Add to favorites successfully');})
            // clearInput();
        }
        $("#myForm").submit(function() {
                return false;
        });
        function clearInput() {
            $("#myForm :input").each(function() {
                $(this).val('');
            })
        }
    </script> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        function saveFavorite(id) {

            var liked = document.getElementById('heart'+id).classList;
                var userId =document.getElementById('userId' + id).value;
                var bookId = document.getElementById('bookId' + id).value;
            if (liked[2] == 'liked') {

                  $.ajax({
                url: document.getElementById("base-url").value + "/deleteFavoriteBook/" + bookId,
                  type: "GET",
                  data: {
                      _token: $("#csrf").val(),
                      type: 1,
                      userId: userId,
                      bookId: bookId
                  },
                  cache: false,
                  success: function(dataResult){
                      console.log(dataResult);
                      if (dataResult.deleted) {
                            var heartChecked = "#heart" + id;
                            $(heartChecked).removeClass('liked');
                            alert('Successfully remove from favorite');
                      } else {
                          alert('please remove it from my favorite book');
                      }
                      if(dataResult.statusCode==200){
                        window.location = "/books";				
                      }
                      else if(dataResult.statusCode==201){
                         alert("Error occured !");
                      }
                      
                  }
              });
            } else {
                if(userId!="" && bookId!="" ){
            /*  $("#butsave").attr("disabled", "disabled"); */
              $.ajax({
                  url: document.getElementById("base-url").value + "/saveFavorite",
                  type: "POST",
                  data: {
                      _token: $("#csrf").val(),
                      type: 1,
                      userId: userId,
                      bookId: bookId
                  },
                  cache: false,
                  success: function(dataResult){
                      console.log(dataResult);
                      if (dataResult.success) {
                            var heartChecked = "#heart" + id;
                            $(heartChecked).addClass('liked');
                            alert('Successfully add to favorite');
                      } else {
                          alert('added to favorite..! To remove it, go on Check/My favorite book list');
                      }
                      if(dataResult.statusCode==200){
                        window.location = "/books";				
                      }
                      else if(dataResult.statusCode==201){
                         alert("Error occured !");
                      }
                      
                  }
              });
          }
          else{
              alert('Please fill all the field !');
          }
            }
          
    }
    </script>
  
</body>


</html>