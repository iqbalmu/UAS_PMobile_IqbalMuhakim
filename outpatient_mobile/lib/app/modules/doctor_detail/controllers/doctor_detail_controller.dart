import 'package:get/get.dart';
import 'package:outpatient_mobile/app/data/models/Doctor.dart';
import 'package:outpatient_mobile/app/data/services/doctor_service.dart';

class DoctorDetailController extends GetxController {
  final DoctorService doctorService = DoctorService();
  final int doctorId = Get.arguments;
  var doctor = Rx<Doctor>(Doctor(
      id: 0,
      nama: '',
      email: '',
      nomorHp: '',
      foto: '',
      nomorStr: '',
      nomorSip: '',
      spesialisasi: '',
      poli: Poli(id: 0, nama: '', deskripsi: ''),
      jadwal: []
  ));
  var isLoading = true.obs;

  @override
  void onInit() {
    super.onInit();
    fetchDoctorById(doctorId);
  }

  void fetchDoctorById(int id) async {
    try {
      isLoading(true);
      var fetchedDoctor = await doctorService.fetchDoctorById(id);
      doctor.value = fetchedDoctor;
    } catch (e) {
      print('Error fetching doctor by id: $e');
    } finally {
      isLoading(false);
    }
  }
}
