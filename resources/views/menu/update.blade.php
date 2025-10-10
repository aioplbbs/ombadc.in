<x-app-layout>
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Update Page</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('menu.update', [$setting->id, $menu->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-6">
                            {{-- Title --}}
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $menu->title) }}">
                            </div>

                            {{-- Parent --}}
                            <div class="mb-3">
                                <label for="parent" class="form-label">Parent</label>
                                <select name="parent_id" id="parent" class="form-control">
                                    <option value="0">Choose Parent Menu</option>
                                    @foreach($menus as $key => $value)
                                        <option value="{{ $key }}" @selected(old('parent_id', $menu->parent_id) == $key)>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row mb-3">
                                {{-- Internal Page --}}
                                <div class="col-md-6">
                                    <label for="page" class="form-label">Page</label>
                                    <select name="url[internal]" id="page" class="form-control">
                                        <option value="0">Choose Page</option>
                                        @foreach($pages as $key => $value)
                                            <option value="{{ $key }}"
                                                @if(old('url.internal', $menu->url_internal) == $key) selected @endif>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- PDF Upload --}}
                                <div class="col-md-6">
                                    <label for="pdf" class="form-label">Upload PDF</label>
                                    <input type="file" id="pdf" name="menu_file" class="form-control">
                                    @if($menu->getFirstMedia('menu_file'))
                                        <small class="pt-1">Current: <a href="{{ $menu->getFirstMediaUrl('menu_file') }}" target="_blank">View PDF</a></small>
                                    @endif
                                </div>
                            </div>

                            {{-- External URL --}}
                            <div class="mb-3">
                                <label for="external_url" class="form-label">External URL</label>
                                <input type="text" id="external_url" name="url[external]" class="form-control"
                                    value="{{ old('url.external', $menu->url_external) }}">
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
</x-app-layout>