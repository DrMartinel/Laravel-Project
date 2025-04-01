<!DOCTYPE html>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add new posts <small>Have fun</small></h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" role="form" id="addPostsForm">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Title</label>
                            <small class="text-navy">At least 5 words</small></label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" placeholder="Enter your title"
                                    id="title">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Content</label>
                            <textarea id="tinymce" name="content"></textarea>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Category <br />
                                <small class="text-navy">Identify your posts category</small></label>

                            <div class="col-sm-10">
                                <div><label> <input type="radio" checked="" value="book" id="optionsRadios1"
                                            name="category" wire:change="dispatch('toggleAuthor')"> Books
                                    </label></div>
                                <div><label> <input type="radio" value="blog" id="optionsRadios2" name="category"
                                            wire:change="dispatch('toggleAuthor')"> Blogs </label></div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group" id="author">
                            <label class="col-sm-2 control-label">Authors</label>
                            <div class="col-sm-10">
                                <div class="col-lg-4 m-l-n">
                                    <select class="form-control" name="author">
                                        @foreach ($authors as $author)
                                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        Livewire.on('reinitializeTinyMCE', () => {
            console.log('Reinitializing TinyMCE...');
            tinymce.remove('textarea#tinymce');
            setTimeout(initTinyMCE, 500);
            setTimeout(bindFormSubmit, 500);
            // This setTimeOut is necessary, because if livewire loads all the DOM, but the tinyMCE textarea have yet to load
            // The tinyMCE load function will fail to identify the target, setTimeOut is used to give time for all the DOM to load.
        });

        Livewire.on('toggleAuthor', () => {
            const author = document.getElementById("author");
            author.style.display = (author.style.display ===
                "none") ? "" : "none";
        })

        function initTinyMCE() {
            tinymce.init({
                selector: 'textarea#tinymce',
                width: 1280,
                skin_url: 'default',
                content_css: 'default',
                extended_valid_elements: 'p,strong,em,a[href|target=_blank],span[class|style]',
                plugins: ' code emoticons link lists table',
                toolbar: ' undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak anchor | charmap emoticons | insertdatetime | preview fullscreen | code codesample | help | image media link | table tableofcontents | accordion',
                height: 600,
                init_instance_callback: function() {
                    console.log('TinyMCE is fully initialized!');
                }
            });
        }

        function bindFormSubmit() {
            const form = document.getElementById('addPostsForm');
            const titleInput = document.getElementById('title');
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission
                const editor = tinymce.get('tinymce');

                if (editor && editor.initialized) {
                    const editorContent = editor.getContent();

                    if (editorContent.trim() === '' || titleInput.value.trim() === '') {
                        event.preventDefault();
                        alert("Please dont leave your form empty");
                        editor.focus();
                    } else {
                        const formData = new FormData(form);
                        formData.append('content', editorContent);
                        fetch('addPosts', {
                                method: 'POST',
                                body: formData,
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                console.log(typeof data.message);
                                Livewire.dispatch('NotificationsFound', {
                                    message: data.message,
                                    condition: data.condition
                                });
                            })
                    }
                } else {
                    event.preventDefault();
                    alert('TinyMCE editor is not initialized.');
                }
            })
        }
    </script>
@endscript
