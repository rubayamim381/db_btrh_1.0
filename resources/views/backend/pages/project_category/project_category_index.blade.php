@extends("backend.layouts.master")
@section("content")
    <!-- Page Title -->
    <div class="pagetitle">
        <h1 class="mb-2">Project Category</h1>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("project_category.index") }}">Project Category</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>
        </nav>
        <hr>
    </div>
    <!-- main content -->
    <!-- if there are no data in project categories table -->
    @if ($project_categorys->count() == 0)
        <div class="container mt-5 text-center">
            <h4>There is no project category added yet.</h4>
            <a href="{{ route("project_category.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i
                    class="fa-solid fa-plus"></i>
                Add Project Category</a>

        </div>
        <!-- if data are present in project categories table -->
    @else
        <div class="container table_create">
            <a href="{{ route("project_category.create") }}" class="btn btn-primary btn-sm mb-3 text-white"><i
                    class="fa-solid fa-plus"></i>
                Add Project Category</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project_categorys as $project_category)
                        <tr>
                            <td>{{ ++$sl }}</td>

                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $project_category->name ?? "" }}</td>
                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $project_category->description ?? "" }}</td>

                            <td>
                                <a href="{{ route("project_category.info", $project_category->id) }}"
                                    class="btn btn-info btn-sm text-white">
                                    <i class="fa-solid fa-circle-info"></i> Info</a>
                                <a href="{{ route("project_category.edit", $project_category->id) }}"
                                    class="btn btn-primary btn-sm text-white">
                                    <i class="fa-solid fa-file-pen"></i> Edit</a>
                                <a href="{{ route("project_category.delete", $project_category->id) }}"
                                    class="btn btn-danger btn-sm text-white"><i class="fa-solid fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- pagination link -->
            {{ $project_categorys->links("pagination::bootstrap-4") }}
        </div>
    @endif

@endsection
