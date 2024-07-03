import 'dart:convert';
import 'package:get_storage/get_storage.dart';
import 'package:http/http.dart' as http;
import 'package:outpatient_mobile/app/data/models/User.dart';

class UserService {
  final String apiUrl = 'https://allowing-eagle-moral.ngrok-free.app/api/user/profile';
  final GetStorage box = GetStorage();

  Future<User> getUserData() async {
    final token = box.read('token');

    try {
      final response = await http.get(
          Uri.parse(apiUrl),
          headers: <String, String>{
            'Authorization': 'Bearer $token'
          }
      );

      if (response.statusCode == 200) {
        final jsonData = jsonDecode(response.body);
        return User.fromJson(jsonData['data']);
      } else {
        throw Exception('Failed to load user profile');
      }
    } catch (e) {
      throw Exception('Error: $e');
    }
  }
}
