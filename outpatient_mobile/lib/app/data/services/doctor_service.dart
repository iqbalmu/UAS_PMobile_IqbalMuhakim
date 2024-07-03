import 'dart:convert';
import 'package:get_storage/get_storage.dart';
import 'package:http/http.dart' as http;
import 'package:outpatient_mobile/app/data/models/Doctor.dart';

class DoctorService {
  final String baseUrl =
      'https://allowing-eagle-moral.ngrok-free.app/api/dokter';

  final GetStorage box = GetStorage();

  Future<List<Doctor>> fetchDoctors({int? limit}) async {
    final token = box.read('token');

    try {
      String url = baseUrl;
      if (limit != null) {
        url += '?limit=$limit';
      }

      final response = await http.get(Uri.parse(url),
          headers: <String, String>{'Authorization': 'Bearer $token'});
      print("Doctor: ${response.statusCode}");

      if (response.statusCode == 200) {
        List<dynamic> body = jsonDecode(response.body)['data'] ?? [];
        List<Doctor> doctors =
            body.map((dynamic item) => Doctor.fromJson(item)).toList();
        return doctors;
      } else {
        throw Exception('Failed to load doctors');
      }
    } catch (e) {
      throw e;
    }
  }

  Future<Doctor> fetchDoctorById(int id) async {
    final token = box.read('token');

    try {
      final response = await http.get(Uri.parse('$baseUrl/$id'),
          headers: <String, String>{'Authorization': 'Bearer $token'});
      print("Fetch Doctor By ID: ${response.statusCode}");

      if (response.statusCode == 200) {
        dynamic body = jsonDecode(response.body)['data'];
        Doctor doctor = Doctor.fromJson(body);
        return doctor;
      } else {
        throw Exception('Failed to load doctor by ID');
      }
    } catch (e) {
      throw e;
    }
  }
}
