<!DOCTYPE html>
@extends('vendor.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInRight" id="booksContainer">
                @php
                    $userItems = $userBooks
                @endphp
                @include('vendor.partials.show-posts', compact('userItems'))
            </div>
            <div class="wrapper wrapper-content animated fadeInRight" id="blogsContainer">
                @php
                    $userItems = $userBlogs
                @endphp
                @include('vendor.partials.show-posts',compact('userItems'))
            </div>
        </div>
    </div>
@endsection
<style>
    .noti-box{
        opacity: 0;
        transition: opacity 1s ease-out;
    }
</style>
<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="frontend_resources/js/bootstrap.min.js"></script>
<script src="frontend_resources/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="frontend_resources/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script>
    document.getElementById("Blogs/Books").addEventListener("mouseenter",() => {
        if(document.getElementById("booksContainer").hasAttribute("hidden")){
            document.getElementById("booksContainer").removeAttribute("hidden");
            document.getElementById("blogsContainer").setAttribute("hidden","true");
        }else {
            document.getElementById("booksContainer").setAttribute("hidden","true");
            document.getElementById("blogsContainer").removeAttribute("hidden");
        }
    });

    Array.from(document.getElementsByClassName('removeItem')).forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior

            // Custom confirmation dialog (can be styled)
            const confirmDialog = document.createElement('div');
            confirmDialog.innerHTML = `
                <div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);
                            background: white; border: 2px solid black; padding: 20px;
                            text-align: center; z-index: 1000;">
                    <p>You are about to delete this post, are you sure?</p>
                    <button id="confirmBtn">Yes</button>
                    <button id="cancelBtn">Cancel</button>
                </div>
            `;
            document.body.appendChild(confirmDialog);

            const confirmBtn = confirmDialog.querySelector('#confirmBtn');
            const cancelBtn = confirmDialog.querySelector('#cancelBtn');

            confirmBtn.addEventListener('click', () => {
                window.location.href = this.href;
            });

            cancelBtn.addEventListener('click', () => {
                document.body.removeChild(confirmDialog);
            });
        });
    });

</script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

</body>

</html>
