<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
        body { background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh; }
        .card { border: none; border-radius: 20px; overflow: hidden; }
        .card-header { border: none; padding: 25px; }
        .form-control, .form-select { border-radius: 10px; padding: 12px; border: 1px solid #e1e5eb; }
        .form-control:focus { box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.1); }
        .btn-save { border-radius: 10px; padding: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; }
    </style>
</head>
<body>
    <div class="container mt-5 animate__animated animate__fadeInUp">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0 fw-bold"><i class="fas fa-user-plus me-2"></i>New Contact</h4>
                    </div>
                    <div class="card-body p-4">
                        @if(session('error'))
                            <div class="alert alert-danger border-0 shadow-sm">{{ session('error') }}</div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success border-0 shadow-sm">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('contacts.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-secondary">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted border-end-0"><i class="fas fa-user"></i></span>
                                    <input type="text" name="name" class="form-control border-start-0 @error('name') is-invalid @enderror" placeholder="John Doe" value="{{ old('name') }}" required>
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label d-flex justify-content-between fw-semibold text-secondary">
                                    Phone Numbers
                                    <button type="button" id="add-btn" class="btn btn-sm btn-link p-0 text-decoration-none fw-bold" onclick="addNumberField()">
                                        <i class="fas fa-plus-circle"></i> Add More
                                    </button>
                                </label>
                                <div id="numbers-container">
                                    <div class="input-group mb-2 animate__animated animate__fadeIn d-flex">
                                        <span class="input-group-text bg-light text-muted border-end-0"><i class="fas fa-phone"></i></span>
                                        <input type="text" name="numbers[0][phone_number]" class="form-control border-start-0" placeholder="05xxxxxxxx">
                                        <select name="numbers[0][type]" class="form-select border-start-0" style="max-width: 120px;">
                                            <option value="family">Family</option>
                                            <option value="personal">Personal</option>
                                            <option value="work">Work</option>
                                            <option value="other" selected>Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary btn-save shadow-sm">Save Contact</button>
                                <a href="{{ route('contacts.index') }}" class="btn btn-light btn-save text-secondary border">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let numberIndex = 1;
        const MAX_NUMBERS = 10;

        function addNumberField() {
            if (numberIndex >= MAX_NUMBERS) {
                alert('You can only add up to 10 phone numbers.');
                return;
            }

            const container = document.getElementById('numbers-container');
            const div = document.createElement('div');
            div.className = 'input-group mb-2 animate__animated animate__fadeInDown d-flex';
            div.innerHTML = `
                <span class="input-group-text bg-light text-muted border-end-0"><i class="fas fa-phone"></i></span>
                <input type="text" name="numbers[${numberIndex}][phone_number]" class="form-control border-start-0" placeholder="05xxxxxxxx">
                <select name="numbers[${numberIndex}][type]" class="form-select border-start-0" style="max-width: 120px;">
                    <option value="Work">Work</option>
                    <option value="Mobile">Mobile</option>
                    <option value="Home">Home</option>
                </select>
                <button type="button" class="btn btn-outline-danger border-0" onclick="this.parentElement.remove(); numberIndex--; updateBtn();"><i class="fas fa-times"></i></button>
            `;
            container.appendChild(div);
            numberIndex++;
            updateBtn();
        }

        function updateBtn() {
            document.getElementById('add-btn').style.display = numberIndex >= MAX_NUMBERS ? 'none' : 'block';
        }
    </script>
</body>
</html>
