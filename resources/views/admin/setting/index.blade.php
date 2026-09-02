@extends('admin.layout')

@section('main')
    <div class="flex-grow-1 p-4 p-md-5">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4 p-md-5">

                <!-- Header -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                    <div>
                        <h1 class="h3 fw-bold mb-1">Update Site Settings</h1>
                        <p class="text-muted mb-0">
                            Manage global website information and social links.
                        </p>
                    </div>

                    <a href="{{ url()->previous() }}" class="btn btn-dark">
                        <i class="fa-solid fa-arrow-left me-2"></i>
                        Back
                    </a>
                </div>

                <x-alert-success />

                <!-- Edit Form -->
                <form action="{{ route('setting.update', $setting) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">

                        <!-- Website Name -->
                        <div class="col-md-6">
                            <label for="web_name" class="form-label fw-semibold">
                                Website Name
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="web_name" id="web_name" class="form-control"
                                value="{{ old('web_name', $setting->web_name ?? '') }}" placeholder="My Website Name"
                                autofocus>
                            <x-validation-error name="web_name" />

                            <div class="form-text">
                                The public name of your website or store.
                            </div>
                        </div>

                        <!-- WhatsApp Number -->
                        <div class="col-md-6">
                            <label for="whatsapp" class="form-label fw-semibold">
                                WhatsApp Number
                            </label>

                            <input type="text" name="whatsapp" id="whatsapp" class="form-control"
                                value="{{ old('whatsapp', $setting->whatsapp ?? '') }}" placeholder="+1234567890">
                            <x-validation-error name="whatsapp" />

                            <div class="form-text">
                                Include international country code (e.g., +1234567890).
                            </div>
                        </div>

                        <!-- Website Description -->
                        <div class="col-12">
                            <label for="web_description" class="form-label fw-semibold">
                                Website Description
                                <span class="text-danger">*</span>
                            </label>

                            <textarea name="web_description" id="web_description" class="form-control" rows="3"
                                placeholder="Write a short description about your website...">{{ old('web_description', $setting->web_description ?? '') }}</textarea>

                            <x-validation-error name="web_description" />

                            <div class="form-text">
                                General site overview or default meta description for SEO.
                            </div>
                        </div>

                        <!-- Facebook Account -->
                        <div class="col-md-4">
                            <label for="fb_account" class="form-label fw-semibold">
                                Facebook Link
                            </label>

                            <input type="url" name="fb_account" id="fb_account" class="form-control"
                                value="{{ old('fb_account', $setting->fb_account ?? '') }}"
                                placeholder="https://facebook.com/yourpage">
                            <x-validation-error name="fb_account" />
                        </div>

                        <!-- X (Twitter) Account -->
                        <div class="col-md-4">
                            <label for="x_account" class="form-label fw-semibold">
                                X (Twitter) Link
                            </label>

                            <input type="url" name="x_account" id="x_account" class="form-control"
                                value="{{ old('x_account', $setting->x_account ?? '') }}"
                                placeholder="https://x.com/yourhandle">
                            <x-validation-error name="x_account" />
                        </div>

                        <!-- Instagram Account -->
                        <div class="col-md-4">
                            <label for="instagram_account" class="form-label fw-semibold">
                                Instagram Link
                            </label>

                            <input type="url" name="instagram_account" id="instagram_account" class="form-control"
                                value="{{ old('instagram_account', $setting->instagram_account ?? '') }}"
                                placeholder="https://instagram.com/yourprofile">
                            <x-validation-error name="instagram_account" />
                        </div>

                    </div>

                    <!-- Form Actions -->
                    <div class="mt-5 pt-3 border-top d-flex flex-column flex-sm-row gap-2">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fa-solid fa-check me-2"></i>
                            Update Settings
                        </button>
                        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary px-4">
                            Cancel
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
