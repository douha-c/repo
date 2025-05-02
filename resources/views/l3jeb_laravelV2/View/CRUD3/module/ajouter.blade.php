@extends('CRUD3.layout');

@section('main')
    <h2 class="card-title text-center mb-4">Ajouter un module</h2>
    <form action="{{route('modules.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">code du module</label>
            <input type="number" class="form-control"  name="code" required>
        </div>
        <div class="mb-3">
            <label class="form-label">titre du module</label>
            <input type="text" class="form-control" name="titre" required>
        </div>
        <div class="mb-3">
            <label  class="form-label">masse horair</label>
            <input type="number" class="form-control" name="MH" required>
        </div>
        <div class="mb-3">
            <label  class="form-label">image</label>
            <input type="file" class="form-control" name="image" required>
        </div>

        <div class="mb-3">
            <label  class="form-label">masse horair</label>
            <input type="number" class="form-control" name="MH" required>
        </div>
        
        <div class="mb-3">
            <fieldset class="border p-4">
                <legend class="w-auto">Representant Information</legend>
                <div class="row">
                    <div class="col">
                        <label  class="form-label">Matricule</label>
                        <input type="text" class="form-control" name="matricule" required>
                    </div>
                    <div class="col">
                        <label  class="form-label">Nom du presentant</label>
                        <input type="text" class="form-control" name="nom" required>
                    </div>
                    <div class="col">
                        <label  class="form-label">Prenom du presentant</label>
                        <input type="text" class="form-control" name="prenom" required>
                    </div>
                    <div class="col">
                        <label  class="form-label">Grade</label>
                        <input type="text" class="form-control" name='grade' required>
                    </div>
                </div>
            </fieldset>
        </div>
        <button type="submit" class="btn btn-primary w-100">Ajouter un module</button>
    </form>
    </div>
@endsection