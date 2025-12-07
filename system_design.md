Dokumen ini berisi diagram dan tabel interaksi untuk memvisualisasikan arsitektur, alur kerja, dan struktur data dari Sistem Informasi Puskesmas Ajibarang.

**Catatan Hak Akses**:

-   **Admin**: Hanya bertugas memanggil antrian dan menampung masukan dari pasien dan dokter. Tidak memiliki akses untuk mengelola data pasien, data dokter, atau melakukan pendaftaran pasien.
-   **Dokter**: Hanya dapat memanggil antrian di poli yang ditugaskan.
-   **Pasien**: Mendaftar mandiri dan memantau antrian.

---

## 1. Use Case Diagram

Diagram ini menggambarkan interaksi aktor dengan fitur-fitur utama sistem.

```mermaid
graph LR
    P[Pasien]
    D[Dokter]
    A[Admin]
    L[Pimpinan]

    subgraph "Sistem Puskesmas"
        UC1(Login / Register)
        UC2(Melihat Informasi Layanan & Jadwal)
        UC3(Daftar Antrian Online)
        UC4(Monitor Antrian Real-time)
        UC5(Mengelola Profil Diri)
        UC6(Memanggil Pasien / Kelola Antrian)
        UC7(Mengelola Data Pasien)
        UC8(Mengelola Data Dokter & Poli)
        UC9(Melihat Pesan Masuk)
        UC10(Melihat Dashboard Statistik)
        UC11(Memberikan Masukan / Kontak)
    end

    P --> UC1
    P --> UC2
    P --> UC3
    P --> UC4
    P --> UC5
    P --> UC11

    D --> UC1
    D --> UC6
    D --> UC4
    D --> UC11

    A --> UC1
    A --> UC6
    A --> UC7
    A --> UC8
    A --> UC9
    A --> UC3

    L --> UC1
    L --> UC10
```

---

## 2. Activity Diagram: Pendaftaran Antrian Pasien

Alur proses pasien mendaftar antrian hingga mendapatkan nomor.

```mermaid
flowchart TD
    Start((Mulai)) --> Login{Sudah Punya Akun?}
    Login -- Ya --> FormLogin[Form Login]
    Login -- Tidak --> FormDaftar[Form Daftar]
    FormLogin --> Dashboard
    FormDaftar --> Dashboard

    Dashboard --> MenuDaftar[Menu Daftar Antrian]
    MenuDaftar --> PilihPoli[Pilih Poli]
    PilihPoli --> CekKuota{Kuota Tersedia?}

    CekKuota -- Ya --> Generate[Generate No Antrian]
    Generate --> SimpanDB[(Simpan Database)]
    SimpanDB --> Redirect[Redirect ke Dashboard Pasien]
    Redirect --> LihatTiket[Lihat Riwayat & Cetak Tiket PDF]
    LihatTiket --> Selesai((Selesai))

    CekKuota -- Tidak --> Penuh[Tampilkan Pesan Penuh]
    Penuh --> Selesai
```

---

## 3. Activity Diagram: Proses Pelayanan (Admin/Dokter)

Alur proses pemanggilan pasien oleh petugas medis.

```mermaid
flowchart TD
    Start((Mulai)) --> Login[Login Petugas/Dokter]
    Login --> Dashboard[Dashboard Antrian]
    Dashboard --> PilihPoli[Pilih Poli]
    PilihPoli --> CekPasien{Ada Pasien?}

    CekPasien -- Ya --> Panggil[Klik Panggil]
    Panggil --> StatusCalled[Status: Called]
    StatusCalled --> Notif[Bunyikan Notifikasi]
    Notif --> Periksa[Periksa Pasien]

    Periksa --> Hadir{Pasien Hadir?}
    Hadir -- Ya --> Layani[Layanan Medis]
    Layani --> SelesaiLayanan[Klik Selesai]
    SelesaiLayanan --> StatusCompleted[Status: Completed]
    StatusCompleted --> CekPasien

    Hadir -- Tidak --> Lewati[Klik Lewati]
    Lewati --> StatusSkipped[Status: Skipped]
    StatusSkipped --> CekPasien

    CekPasien -- Tidak --> Tunggu[Standby / Tunggu Pasien]
    Tunggu --> CekPasien
```

---

## 4. Entity Relationship Diagram (ERD)

Struktur database dan relasi antar tabel.

```mermaid
erDiagram
    USERS ||--o| PATIENTS : "has one"
    USERS ||--o| DOCTORS : "has one"

    POLIES ||--o{ DOCTORS : "has many"
    POLIES ||--o{ QUEUES : "has many"

    DOCTORS ||--o{ QUEUES : "serves"

    PATIENTS ||--o{ QUEUES : "has many"

    USERS {
        bigint id PK
        string name
        string email
        string password
        string role "patient, admin, doctor, leader"
        string nik
    }

    PATIENTS {
        bigint id PK
        bigint user_id FK
        string nik
        string name
        date dob
        string gender
        text address
    }

    DOCTORS {
        bigint id PK
        bigint user_id FK
        bigint poly_id FK
        string specialization
    }

    POLIES {
        bigint id PK
        string name
        string description
        string image
    }

    QUEUES {
        bigint id PK
        bigint patient_id FK
        bigint poly_id FK
        bigint doctor_id FK
        int number
        date date
        enum status "waiting, called, completed, skipped"
    }

    CONTACT_MESSAGES {
        bigint id PK
        string name
        string email
        text message
    }
```

---

## 5. Class Diagram

Struktur kelas utama (Model & Livewire Component) dalam aplikasi.

```mermaid
classDiagram
    class User {
        +id: int
        +name: string
        +email: string
        +role: string
        +patient(): HasOne
        +doctor(): HasOne
    }

    class Patient {
        +id: int
        +user_id: int
        +nik: string
        +queues(): HasMany
        +user(): BelongsTo
    }

    class Doctor {
        +id: int
        +user_id: int
        +poly_id: int
        +poly(): BelongsTo
        +queues(): HasMany
        +user(): BelongsTo
    }

    class Poly {
        +id: int
        +name: string
        +doctors(): HasMany
        +queues(): HasMany
    }

    class Queue {
        +id: int
        +number: int
        +status: enum
        +patient(): BelongsTo
        +doctor(): BelongsTo
        +poly(): BelongsTo
    }

    class PatientRegistration {
        +submit()
    }

    class PatientDashboard {
        +queues: Collection
        +render()
    }

    class QueueTicketController {
        +downloadPdf()
    }

    User "1" -- "0..1" Patient
    User "1" -- "0..1" Doctor
    Doctor "1" -- "*" Queue
    Patient "1" -- "*" Queue
    Poly "1" -- "*" Doctor
    Poly "1" -- "*" Queue
```
