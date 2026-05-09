<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Details - {{ $contact->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
        body { background: #f0f2f5; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .card { border: none; border-radius: 20px; width: 100%; max-width: 700px; }
        .profile-header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 40px; border-radius: 20px 20px 0 0; }
        .number-card { background: #f8f9fa; border-radius: 12px; padding: 15px; border-left: 4px solid #667eea; transition: all 0.3s; }
        .number-card:hover { transform: translateY(-3px); box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
    </style>
</head>
<body>
    <div class="container py-5 animate__animated animate__zoomIn">
        <div class="card shadow-lg mx-auto">
            <div class="profile-header text-center">
                <div class="mb-3">
                    <i class="fas fa-user-circle fa-5x"></i>
                </div>
                <h2 class="fw-bold mb-1">{{ $contact->name }}</h2>
                <span class="badge bg-white text-primary rounded-pill px-3 py-2 mt-2">ID: {{ substr($contact->id, 0, 8) }}</span>
            </div>
            <div class="card-body p-4">
                <h5 class="fw-bold mb-4 text-secondary"><i class="fas fa-phone-alt me-2"></i>Saved Numbers ({{ $contact->numbers->count() }}/10)</h5>

                <div class="row g-3">
                    @forelse($contact->numbers as $number)
                        <div class="col-md-6 animate__animated animate__fadeInUp">
                            <div class="number-card d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="small text-uppercase fw-bold text-muted">{{ $number->type }}</div>
                                    <div class="fs-5 fw-semibold text-dark">{{ $number->phone_number }}</div>
                                </div>
                                <a href="tel:{{ $number->phone_number }}" class="btn btn-primary btn-sm rounded-circle"><i class="fas fa-phone"></i></a>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-4 text-muted">
                            <p>No phone numbers recorded for this contact.</p>
                        </div>
                    @endforelse
                </div>

                <hr class="my-4 opacity-50">

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('contacts.index') }}" class="btn btn-light rounded-pill px-4 border">
                        <i class="fas fa-arrow-left me-2"></i>Back to List
                    </a>
                    <p class="mb-0 text-muted small">Created: {{ $contact->created_at->format('M d, Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
