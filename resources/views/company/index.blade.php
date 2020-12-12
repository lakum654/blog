<html lang="en">
<head>
    <title>Laravel DataTables Tutorial Example</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
        <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
       <!--  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->  
       <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


</head>
      <body>
         <div class="container">
               <h2>Laravel DataTables Tutorial Example</h2>
            <table class="table table-striped table-sm" id="table-data">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>City</th>
                     <th>Phone</th>
                     <th>Action</th>
                     <th>D</th>
                  </tr>
               </thead>
            </table>
         </div>

       <script>
              
          $(function() {
            $('#table-data').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{{ route('employee') }}",
               columns: [
                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name' },
                        { data: 'city', name: 'city' },
                        { data: 'phone', name: 'phone' },
                        { data: 'action', name: 'action', orderable: false, searchable: false},
                        { data: 'delete', name: 'delete', orderable: false, searchable: false},
                     ]            
              });
            });
        
                
       
        
        $(document).on('click','#delete-btn',function(){  
         var id = $(this).data('id');
         var delUrl = 'employee/delete/'+id;
          $(this).text('Deleted');
        $.ajax({
        url:delUrl,
        type:'GET',
        dataType:'json',
        success:function(response){
          
        }
      });
    });
      
   
      

         </script>
   </body>
</html>