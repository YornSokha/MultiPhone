<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <title>Document</title>
</head>
<body>
<div>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark navbar-fixed">
        <a class="navbar-brand" href="/"><img src="/images/camsolution.png" class="img-home" alt=""></a>
    </nav>
    <div class="jumbotron">
        <div class="jumbotron-height"></div>
        {{--<p class="sub-title animated bounceInRight text-center">Share your problems with us to get right solutions for your  business.</p>--}}
        <h1 class="sub-title animated bounceInLeft text-center">USER</h1>
        <hr class="style-eight sub-title animated bounceInRight">
    </div>

</div>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>
</div>
<div>

    @yield('footer')
</div>
</body>
<script
        src="http://code.jquery.com/jquery-2.2.4.js"
        integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript">

    $(document).ready(function () {
        var counter = 1;

        $(document).on('click', '.remove-update', function () {
            var _this = $(this);
            _this.closest('.add-field-update').remove();
        });

        $('#btnShow').click(function () {
            // $('#titleModal').modal.show();
            $('#titleModal').modal('show');
        });

        $(document).on('click', '#btn-update', function () {
            swal(
                'Updated!',
                '',
                'success'
            ).then((result) => {
                $('.align-self-center').submit();
            })
        });
        $(document).on('click', '#btn-update-modal', function () {
            swal(
                'Updated!',
                '',
                'success'
            ).then((result) => {
                // $('.modal-update').submit();
                var btnUpdate = $(this);
                btnUpdate.closest('.modal-update').submit();
            })
        });



        function readURL(input, _this) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    _this.closest('.image-profile').find('img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#preview-image").change(function (event) {
            var target = event.target || event.srcElement;
            if (target.value.length == 0) {
                $(this).closest('.image-profile').find('img').attr('src', 'images/img_avatar.png');
            } else {
                readURL(this, $(this));
            }
        });


        $(document).on('click', '.add-update', function (e) {
                e.preventDefault();
                var phone = '<div class="add-field-update">\
                                <div class="row" >\
                                    <div class="form-group col-md-11">\
                                        <label>Phone ' + ++counter + '</label>\
                                        <input type="text" class="form-control" name="phones[]" placeholder="Enter phone" required><br/>\
                                    </div>\
                                    <div class="col-md-1">\
                                        <label for="btn-add-more">Remove</label>\
                                        <button class="btn btn-danger remove-update">X</button>\
                                    </div>\
                                </div>\
                            </div>';

                var btnAdd = $(this);
                btnAdd.closest('.add-field-update').append(phone);
        });

        $(document).on('click', '#btn-delete', function () {
            var _this = $(this);
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    _this.closest('.form-inline').submit();
                }
            })
        });

        $(document).on('click','.remove',function () {
            $(this).closest('.add-field').remove();
            --counter;
        });

        $(document).on('click', '.add', function (e){
            if(counter < 3){
                e.preventDefault();
                var phone = '<div class="add-field">\
                                <div class="row" >\
                                    <div class="form-group col-md-11">\
                                        <label>Phone '+ ++counter +'</label>\
                                        <input type="text" class="form-control" name="phones[]" placeholder="Enter phone" required><br/>\
                                    </div>\
                                    <div class="col-md-1">\
                                        <label for="btn-add-more">Remove</label>\
                                        <button class="btn btn-danger remove">X</button>\
                                    </div>\
                                </div>\
                            </div>';

                $("#add-field").append(phone);
            }else {
                alert("User may have only maximum with 3 phone numbers");
                return false;
            }

        })
    });


    // $(document).ready(function() {
    //     var counter = 1;
    //
    //     $("#btn-add-more").click(function () {
    //
    //         if (counter > 4) {
    //             alert("Only 3 textboxes are allowed!");
    //             return false;
    //         }
    //
    //         var newTextBoxDiv = $(document.createElement('div'))
    //             .attr("id", 'TextBoxDiv' + counter);
    //
    //         newTextBoxDiv.after().html('<label>Textbox #' + counter + ' : </label>' +
    //             '<input type="text" name="textbox' + counter +
    //             '" id="textbox' + counter + '" value="" >');
    //
    //         newTextBoxDiv.appendTo("#TextBoxesGroup");
    //
    //
    //         counter++;
    //     });
    // });

    // $(document).on('click', '#btn-delete', function() {
    //     var _this = $(this);
    //     swal({
    //         title: 'Are you sure?',
    //         text: "You won't be able to revert this!",
    //         type: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes, delete it!'
    //     }).then((result) => {
    //         if (result.value) {
    //             _this.closest('.form-inline').submit();
    //         }
    //     })
    // })

    // $(document).on('click', '#btn-add', function () {
    //     swal(
    //         'Added!',
    //         '',
    //         'success'
    //     ).then((result) => {
    //         $('.align-self-center').submit();
    //     })
    // })

</script>

</html>

