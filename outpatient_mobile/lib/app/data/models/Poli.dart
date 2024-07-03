class Poli {
  final int id;
  final String nama;
  final String deskripsi;

  Poli({required this.id, required this.nama, required this.deskripsi});

  factory Poli.fromJson(Map<String, dynamic> json) {
    return Poli(
      id: json['id'],
      nama: json['nama'],
      deskripsi: json['deskripsi'],
    );
  }
}
