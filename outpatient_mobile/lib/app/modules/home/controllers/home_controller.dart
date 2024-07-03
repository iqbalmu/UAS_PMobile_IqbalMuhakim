import 'package:get/get.dart';
import 'package:outpatient_mobile/app/data/models/Doctor.dart';
import 'package:outpatient_mobile/app/data/models/User.dart';
import 'package:outpatient_mobile/app/data/services/doctor_service.dart';
import 'package:outpatient_mobile/app/data/services/user_service.dart';

class HomeController extends GetxController {
  var searchText = ''.obs;
  var searchResults = <String>[].obs;
  var isLoading = false.obs;

  var doctors = <Doctor>[].obs;
  var user = User(
    nama: '',
    email: '',
    nomorHp: '',
    profile: Profile(
      mrn: '',
      nik: '',
      jenisKelamin: '',
      profesi: '',
      alamat: '',
      imageProfile: '',
    ),
  ).obs;

  @override
  void onInit() {
    super.onInit();
    fetchUserData();
    fetchDoctors(limit: 4);
  }

  void fetchDoctors({int? limit}) async {
    isLoading(true);
    try {
      var fetchedDoctors = await DoctorService().fetchDoctors(limit: limit);
      doctors.value = fetchedDoctors;
    } catch (e) {
      Get.snackbar('Error', e.toString());
    } finally {
      isLoading(false);
    }
  }

  void fetchUserData() async {
    try {
      isLoading(true);
      User fetchedUser = await UserService().getUserData();
      user.value = fetchedUser;
    } catch (e) {
      print("ERROR $e");
      Get.snackbar('Error', e.toString());
    } finally {
      isLoading(false);
    }
  }

  void search() {
    final data = [
      'Flutter',
      'Dart',
      'React Native',
      'Swift',
      'Kotlin',
      'Java',
      'JavaScript'
    ];

    searchResults.value = data
        .where((item) =>
            item.toLowerCase().contains(searchText.value.toLowerCase()))
        .toList();
  }
}
