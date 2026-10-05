class Mobil {
  final int id;
  final String nama;
  final int harga;
  final String? gambar;
  final String status;

  Mobil({
    required this.id,
    required this.nama,
    required this.harga,
    this.gambar,
    required this.status,
  });

  factory Mobil.fromJson(Map<String, dynamic> json) {
    return Mobil(
      id: json['id'],
      nama: json['nama'],
      harga: json['harga'],
      gambar: json['gambar'],
      status: json['status'],
    );
  }
}
