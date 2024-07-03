import 'dart:convert';
import 'package:get_storage/get_storage.dart';
import 'package:http/http.dart' as http;
import 'package:outpatient_mobile/app/data/models/Doctor.dart';

class PoliService {
  final String baseUrl = 'https://allowing-eagle-moral.ngrok-free.app/api/poli';
  final GetStorage box = GetStorage();

  Future<List<Poli>> fetchPoli() async {
    final token = box.read('token');
    final response = await http.get(Uri.parse(baseUrl),
        headers: <String, String>{'Authorization': 'Bearer $token'});

    if (response.statusCode == 200) {
      List jsonResponse = json.decode(response.body)['data'];
      print("POLI DATA: $jsonResponse");
      return jsonResponse.map((poli) => Poli.fromJson(poli)).toList();
    } else {
      throw Exception('Failed to load poli');
    }
  }
}
