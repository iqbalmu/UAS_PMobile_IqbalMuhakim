class User {
  final String nama;
  final String email;
  final String nomorHp;
  final Profile profile;

  User({
    required this.nama,
    required this.email,
    required this.nomorHp,
    required this.profile,
  });

  factory User.fromJson(Map<String, dynamic> json) {
    return User(
      nama: json['nama'],
      email: json['email'],
      nomorHp: json['nomor_hp'],
      profile: Profile.fromJson(json['profile']),
    );
  }
}

class Profile {
  final String mrn;
  final String nik;
  final String jenisKelamin;
  final String profesi;
  final String alamat;
  final String imageProfile;

  Profile({
    required this.mrn,
    required this.nik,
    required this.jenisKelamin,
    required this.profesi,
    required this.alamat,
    required this.imageProfile,
  });

  factory Profile.fromJson(Map<String, dynamic> json) {
    return Profile(
      mrn: json['mrn'],
      nik: json['nik'],
      jenisKelamin: json['jenis_kelamin'],
      profesi: json['profesi'],
      alamat: json['alamat'],
      imageProfile: json['image_profile'],
    );
  }
}
