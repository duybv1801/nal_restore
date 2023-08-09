@extends('Admin')

@section('content')
<div class="container">
    <h1>Settings</h1>

    <form id="settings-form">
        <div class="settings-list">
            @foreach ($settings as $setting)
            <div class="setting-item">
                <label for="setting-{{ $setting->id }}">{{ $setting->key }}</label>
                <input type="text" id="setting-{{ $setting->id }}" name="settings[{{ $setting->id }}]" value="{{ $setting->value }}">
            </div>
            @endforeach
        </div>

        <button id="save-settings" type="button">Save Settings</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const saveButton = document.getElementById('save-settings');
        const form = document.getElementById('settings-form');

        saveButton.addEventListener('click', function() {
            const formData = new FormData(form);
            fetch('/api/settings', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    alert('Update successfully');
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
</script>
@endsection