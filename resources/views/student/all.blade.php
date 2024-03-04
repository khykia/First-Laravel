@extends('layouts.main')

@section('content')
    <h1>Ini adalah halaman students</h1>
    @if(session('success'))
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
    </svg>
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:" width="20" height="20"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            {{ session('success') }}
        </div>
    </div>
    @endif
    <div style="display: flex; align-item: center; justify-content: center;">
        <table class="table table-bordered table-dark table-striped" style="text-align: center;">
            <thead>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                {{-- <th>Action</th> --}}
            </thead>
            <tbody>
                @php
                $no = ($students->currentPage() - 1) * $students->perPage() + 1;
                @endphp
                @foreach($students as $student)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <th>{{ $student->nis }}</th>
                        <td>{{ $student->nama }}</td>
                        <td>{{ $student->kelas->nama }}</td>
                        {{-- <td>
                            <a type="button" class="btn btn-primary" href="/student/detail/{{ $student->id }}">Detail</a>
                        </td> --}}
                    </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item {{ $students->previousPageUrl() ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $students->previousPageUrl() }}" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          @foreach ($students->getUrlRange(1, $students->lastPage()) as $page => $url)
          <li class="page-item {{ $page == $students->currentPage() ? 'active' : '' }}">
            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
          </li>
          @endforeach
          <li class="page-item">
            <a class="page-link {{ $students->nextPageUrl() ? '' : 'disabled' }}" href="{{ $students->nextPageUrl() }}"
              aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
@endsection