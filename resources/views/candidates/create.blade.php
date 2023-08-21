@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" name="full_name" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="picture">Picture</label>
                <input type="file" name="picture" class="form-control-file">
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="resume">Resume</label>
                <input type="file" name="resume" class="form-control-file">
            </div>
            
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" class="form-control">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="birth_date">Birth Date</label>
                <input type="date" name="birth_date" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="zipcode">Zipcode</label>
                <input type="text" name="zipcode" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="latest_degree">Latest Degree</label>
                <input type="text" name="latest_degree" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="latest_university">Latest University</label>
                <input type="text" name="latest_university" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="current_company">Current Company</label>
                <input type="text" name="current_company" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="current_department">Current Department</label>
                <input type="text" name="current_department" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="current_position">Current Position</label>
                <input type="text" name="current_position" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create Candidate</button>
        </form>
    </div>
@endsection
