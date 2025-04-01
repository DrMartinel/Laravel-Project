<div>
    @if ($errorMessages)
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <ul>
                @foreach ($errorMessages as $$error)
                    <li>{{ $$error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($successMessages)
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <ul>
                @foreach ($successMessages as $success)
                    <li>{{ $success }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
