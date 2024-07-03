class Doctor {
  final int id;
  final String nama;
  final String email;
  final String nomorHp;
  final String foto;
  final String nomorStr;
  final String nomorSip;
  final String spesialisasi;
  final Poli poli;
  final List<Jadwal> jadwal;

  Doctor({
    required this.id,
    required this.nama,
    required this.email,
    required this.nomorHp,
    required this.foto,
    required this.nomorStr,
    required this.nomorSip,
    required this.spesialisasi,
    required this.poli,
    required this.jadwal,
  });

  factory Doctor.fromJson(Map<String, dynamic> json) {
    var jadwalList = json['jadwal'] as List? ?? [];
    List<Jadwal> jadwal = jadwalList.map((i) => Jadwal.fromJson(i)).toList();

    return Doctor(
      id: json['id'],
      nama: json['nama'],
      email: json['email'],
      nomorHp: json['nomor_hp'],
      foto: json['foto'],
      nomorStr: json['nomor_str'],
      nomorSip: json['nomor_sip'],
      spesialisasi: json['spesialisasi'],
      poli: Poli.fromJson(json['poli']),
      jadwal: jadwal,
    );
  }
}

class Poli {
  final int id;
  final String nama;
  final String deskripsi;

  Poli({
    required this.id,
    required this.nama,
    required this.deskripsi,
  });

  factory Poli.fromJson(Map<String, dynamic> json) {
    return Poli(
      id: json['id'],
      nama: json['nama'],
      deskripsi: json['deskripsi'],
    );
  }
}

class Jadwal {
  final String hari;
  final String startTime;
  final String endTime;

  Jadwal({
    required this.hari,
    required this.startTime,
    required this.endTime,
  });

  factory Jadwal.fromJson(Map<String, dynamic> json) {
    return Jadwal(
      hari: json['hari'],
      startTime: json['mulai'],
      endTime: json['selesai'],
    );
  }
}
