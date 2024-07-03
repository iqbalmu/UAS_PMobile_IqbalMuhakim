import 'package:get/get.dart';
import 'package:outpatient_mobile/app/data/models/Doctor.dart';
import 'package:outpatient_mobile/app/data/services/doctor_service.dart';
import 'package:outpatient_mobile/app/data/services/poli_service.dart';

class DoctorController extends GetxController {
  var searchText = "".obs;
  var searchResults = <String>[].obs;
  var doctors = <Doctor>[].obs;
  var polis = <Poli>[].obs;
  var selectedCategory = 'Semua'.obs;
  var isLoading = false.obs;

  final DoctorService doctorService = DoctorService();
  final PoliService poliService = PoliService();

  @override
  void onInit() {
    super.onInit();
    fetchDoctors();
    fetchPolis();
  }

  void fetchDoctors({int? limit}) async {
    isLoading(true);
    try {
      var doctorList = await doctorService.fetchDoctors(limit: limit);
      doctors.assignAll(doctorList);
    } catch (e) {
      Get.snackbar('Error', e.toString());
    } finally {
      isLoading(false);
    }
  }

  void fetchPolis() async {
    isLoading(true);
    try {
      var poliList = await poliService.fetchPoli();
      polis.assignAll([Poli(id: 0, nama: 'Semua', deskripsi: '')] + poliList);
    } catch (e) {
      Get.snackbar('Error', e.toString());
    } finally {
      isLoading(false);
    }
  }

  List<Doctor> get filteredDoctors {
    if (selectedCategory.value == 'Semua') {
      return doctors;
    } else {
      return doctors.where((doctor) => doctor.poli.nama == selectedCategory.value).toList();
    }
  }

}
