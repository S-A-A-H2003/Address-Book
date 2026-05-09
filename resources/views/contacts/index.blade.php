<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Book - Contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
        body { background: #f0f2f5; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .card { border: none; border-radius: 15px; transition: transform 0.3s; }
        .table-container { background: white; border-radius: 15px; overflow: hidden; }
        .btn-add { border-radius: 10px; padding: 10px 20px; font-weight: 600; transition: all 0.3s; }
        .btn-add:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3); }
        .contact-row { transition: all 0.2s; }
        .contact-row:hover { background-color: #f8f9fa !important; transform: scale(1.01); }
        .badge-type { padding: 8px 12px; border-radius: 8px; font-weight: 500; }
    </style>
</head>
<body>
    <div class="container mt-5 animate__animated animate__fadeIn">
        <div class="d-flex justify-content-between align-items-center mb-4 animate__animated animate__slideInDown">
            <h2 class="fw-bold">Address Book</h2>
            <a href="{{ route('contacts.create') }}" class="btn btn-primary btn-add">
                <i class="fas fa-plus-circle me-2"></i>Add New Contact
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('contacts.index') }}" method="GET" class="mb-4">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bg-white border-end-0 text-muted"><i class="fas fa-search"></i></span>
                        <input type="text" name="search" class="form-control border-start-0 ps-0" placeholder="Search by name or number..." value="{{ request('search') }}">
                        <button class="btn btn-primary px-4" type="submit">Search</button>
                    </div>
                </form>

                <div class="table-responsive table-container shadow-sm">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Name</th>
                                <th>Phone Numbers</th>
                                <th class="text-end pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contacts as $contact)
                                <tr class="contact-row animate__animated animate__fadeInUp">
                                    <td class="ps-4 fw-bold text-dark">{{ $contact->name }}</td>
                                    <td>
                                        @foreach($contact->numbers as $number)
                                            <div class="text-muted small mb-1">
                                                <span class="badge bg-light text-secondary border me-1">{{ $number->type }}</span>
                                                <i class="fas fa-phone-alt me-1 text-secondary small"></i> {{ $number->phone_number }}
                                            </div>
                                        @endforeach
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-outline-info btn-sm border-0"><i class="fas fa-eye"></i></a>
                                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm border-0">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">No contacts found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 d-flex justify-content-center">
                    {{ $contacts->appends(request()->query())->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('contacts.exit') }}" class="text-secondary text-decoration-none small">
                <i class="fas fa-chevron-left me-1"></i> Back to Home
            </a>
        </div>
    </div>
</body>
</html>
