<x-app-layout>
    @push('style')
    <style>
        /**
 * Nestable
 */

.dd { position: relative; display: block; margin: 0; padding: 0; max-width: 600px; list-style: none; font-size: 13px; line-height: 20px; }

.dd-list { display: block; position: relative; margin: 0; padding: 0; list-style: none; }
.dd-list .dd-list { padding-left: 30px; }
.dd-collapsed .dd-list { display: none; }

.dd-item,
.dd-empty,
.dd-placeholder { display: block; position: relative; margin: 0; padding: 0; min-height: 20px; font-size: 13px; line-height: 20px; }

.dd-handle { display: block; height: 30px; margin: 5px 0; padding: 5px 10px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
    background: #fafafa;
    background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:         linear-gradient(top, #fafafa 0%, #eee 100%);
    -webkit-border-radius: 3px;
            border-radius: 3px;
    box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd-handle:hover { color: #2ea8e5; background: #fff; }

.dd-item > button { display: block; position: relative; cursor: pointer; float: left; width: 25px; height: 20px; margin: 5px 0; padding: 0; text-indent: 100%; white-space: nowrap; overflow: hidden; border: 0; background: transparent; font-size: 12px; line-height: 1; text-align: center; font-weight: bold; }
.dd-item > button:before { content: '+'; display: block; position: absolute; width: 100%; text-align: center; text-indent: 0; }
.dd-item > button[data-action="collapse"]:before { content: '-'; }

.dd-placeholder,
.dd-empty { margin: 5px 0; padding: 0; min-height: 30px; background: #f2fbff; border: 1px dashed #b6bcbf; box-sizing: border-box; -moz-box-sizing: border-box; }
.dd-empty { border: 1px dashed #bbb; min-height: 100px; background-color: #e5e5e5;
    background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                      -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image:    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                         -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image:         linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                              linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-size: 60px 60px;
    background-position: 0 0, 30px 30px;
}

.dd-dragel { position: absolute; pointer-events: none; z-index: 9999; }
.dd-dragel > .dd-item .dd-handle { margin-top: 0; }
.dd-dragel .dd-handle {
    -webkit-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
            box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
}
.dd-handle a { pointer-events: auto !important; }

.dd-item {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    margin-bottom: 10px;
    transition: all 0.2s ease-in-out;
    padding: 20px;
}

.dd-item:hover {
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.dd-handle {
    background: #f8f9fa;
    border-bottom: 1px solid #eee;
    cursor: move; /* keeps drag functionality */
    height: auto !important;
}

.dd-content {
    padding: 10px;
}

.dd-list {
    margin-left: 25px;
    display: flex;
    gap: 5px;
}


    </style>
    @endpush
    <div class="page-container">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center justify-content-between">
                <h4 class="header-title">Menu List</h4>
                @can('create personal-profile')
                <a href="{{route('personal-profile.create')}}" class="btn btn-primary btn-sm" > Add personal profile </a>
                @endcan
            </div>
            <div class="card-body">
                
                <div class="table-responsive-sm">
                    <div class="dd" id="nestable">
                        <ol class="dd-list ">
                            
                            @if(!empty($personal_profiles))
                            @include('personal-profile.heirarchical-list', ['items' => $personal_profiles])
                            @endif
                        </ol>
                    </div>
                    <button id="saveMenu" class="btn btn-primary btn-sm mt-3">Save Position</button>
                </div> <!-- end table-responsive-->
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>

    @push('script')
    <script src="{{asset('/js/nestable.js')}}"></script>

    <script>
        $(document).ready(function(){

            $('#nestable').nestable({
                group: 1
            });

            $('#saveMenu').on('click', function() {
                var jsonData = window.JSON.stringify($('#nestable').nestable('serialize'));
                // Send via POST
                $.post({
                    url: "{{route('personal-profile.update-position')}}", // <-- change to your Laravel route
                    data: {
                        _token: '{{ csrf_token() }}', // Laravel CSRF token
                        menu_data: jsonData
                    },
                    success: function(response) {
                        customAlart("success", "Menu order updated successfully!");
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        customAlart("warning", "Error updating menu order!");
                    }
                });
            });
        });
    </script>
    @endpush
</x-app-layout>