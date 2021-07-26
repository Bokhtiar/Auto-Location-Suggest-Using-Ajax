<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Auto Location suggest</title>
</head>
<body>

    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="">
                    <div class="form-group">
                        <label for="">Select Division</label>
                        <select id="devision_id" name="division_id" class="form-control" >
                            <option value="">Select Division</option>
                            @foreach ($divisions as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--end of division-->

                    <div class="form-group">
                        <label for="">Select District</label>
                        <select name="district_id" class="form-control" id="district_id">
                            <option value="">Select District</option>
                        </select>
                    </div>
                    <!--end of division-->


                    <div class="form-group">
                        <label for="">Select Upozila</label>
                        <select name="upozila_id" class="form-control" id="upozila_id">
                            <option value="">Select Upozila</option>
                        </select>
                    </div>
                    <!--end of Upozila-->


                </form>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



           $('select[name="division_id"]').on('change', function(){
               var division_id = $(this).val();
               if(division_id){
                $.ajax({
                    url:'district/'+division_id,
                    type:'GET',
                    dataType:"Json",
                    success:function(data){
                        data.forEach( item => {
                            $("#district_id").append('<option value='+item.id+'>'+item.name+'</option>')
                        });
                            $('select[name="district_id"]').on('change', function(){
                                var district_id = $(this).val()
                                console.log(district_id)
                                if(district_id){
                                    $.ajax({
                                        url:'upozila/'+district_id,
                                        type:'GET',
                                        dataType:'Json',
                                        success:function(data){
                                            data.forEach(item => {
                                                $('#upozila_id').append('<option value='+item.id+'>'+ item.name +'</option>')
                                            });

                                        }
                                    })
                                }
                            })

                    }

                })
               }

           })


    </script>

</body>
</html>
