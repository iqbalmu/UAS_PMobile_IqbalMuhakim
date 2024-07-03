import 'package:flutter/material.dart';

import 'package:get/get.dart';

import '../controllers/doctor_detail_controller.dart';

class DoctorDetailView extends GetView<DoctorDetailController> {
  const DoctorDetailView({Key? key}) : super(key: key);
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: PreferredSize(
        preferredSize: const Size.fromHeight(kToolbarHeight),
        child: Container(
          decoration: BoxDecoration(
            boxShadow: [
              BoxShadow(
                color: Colors.grey.withOpacity(0.3),
                spreadRadius: 0.3,
                blurRadius: 0.3,
                offset: const Offset(0, 0.5), // changes position of shadow
              ),
            ],
          ),
          child: AppBar(
            title: const Text(
              'Detail Dokter',
              style: TextStyle(fontSize: 16, color: Colors.white),
            ),
            centerTitle: true,
            shadowColor: Colors.black,
            foregroundColor: Colors.white,
            backgroundColor: const Color(0xFF16A085),
          ),
        ),
      ),
      body: Column(
        children: [
          Container(
            // height: 200,
            padding: const EdgeInsets.only(bottom: 20, top: 8),
            width: Get.width,
            color: const Color(0xFF16A085),
            child: Obx(() {
              return Column(children: [
                CircleAvatar(
                  radius: 60,
                  backgroundImage: controller.doctor.value.foto.isNotEmpty
                      ? NetworkImage(
                      "https://allowing-eagle-moral.ngrok-free.app/uploads/dokter/${controller.doctor.value.foto}")
                      : const NetworkImage(
                      "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"),
                ),
                const SizedBox(height: 15),
                Text(
                  controller.doctor.value.nama,
                  style: const TextStyle(
                      color: Colors.white,
                      fontSize: 18,
                      fontWeight: FontWeight.w600),
                ),
                Text(
                  controller.doctor.value.spesialisasi,
                  style: const TextStyle(
                    color: Colors.white70,
                  ),
                ),
              ]);
            }),
          ),
          Expanded(
            child: SingleChildScrollView(
              padding: const EdgeInsets.symmetric(horizontal: 24, vertical: 16),
              child: Obx(() {
                if (controller.isLoading.value) {
                  return const Center(
                      child: CircularProgressIndicator(
                          backgroundColor: Color(0xFF16A085),
                          valueColor:
                              AlwaysStoppedAnimation<Color>(Colors.white)));
                }

                var doctor = controller.doctor.value;
                if (doctor == null) {
                  return const Center(child: Text('Doctor not found'));
                }

                return Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    const Center(
                      child: const Text(
                        "Tentang Dokter",
                        style: TextStyle(
                            fontSize: 16,
                            fontWeight: FontWeight.bold,
                            color: Colors.blueGrey),
                      ),
                    ),
                    const SizedBox(height: 10),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        const Text(
                          "Nomor STR",
                          style: TextStyle(fontSize: 14, color: Colors.black54),
                        ),
                        Text(
                          controller.doctor.value.nomorStr,
                          style: const TextStyle(
                              fontSize: 16, fontWeight: FontWeight.w500),
                        ),
                      ],
                    ),
                    const SizedBox(height: 10),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        const Text(
                          "Nomor SIP",
                          style: TextStyle(fontSize: 14, color: Colors.black54),
                        ),
                        Text(
                          controller.doctor.value.nomorSip,
                          style: const TextStyle(
                              fontSize: 16, fontWeight: FontWeight.w500),
                        ),
                      ],
                    ),
                    SizedBox(height: 10),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        const Text(
                          "Poliklinik",
                          style: TextStyle(fontSize: 14, color: Colors.black54),
                        ),
                        Text(
                          controller.doctor.value.poli.nama,
                          style: const TextStyle(
                              fontSize: 16, fontWeight: FontWeight.w500),
                        ),
                      ],
                    ),
                    const SizedBox(height: 10),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        const Text(
                          "Email",
                          style: TextStyle(fontSize: 14, color: Colors.black54),
                        ),
                        Text(
                          controller.doctor.value.email,
                          style: const TextStyle(
                              fontSize: 16, fontWeight: FontWeight.w500),
                        ),
                      ],
                    ),
                    SizedBox(height: 10),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        const Text(
                          "Contact",
                          style: TextStyle(fontSize: 14, color: Colors.black54),
                        ),
                        Text(
                          controller.doctor.value.nomorHp,
                          style: const TextStyle(
                              fontSize: 16, fontWeight: FontWeight.w500),
                        ),
                      ],
                    ),
                    const SizedBox(height: 30),
                    const Center(
                      child: Text(
                        "Jadwal Praktek",
                        style: TextStyle(
                            fontSize: 16,
                            fontWeight: FontWeight.bold,
                            color: Colors.blueGrey),
                      ),
                    ),
                    const SizedBox(height: 10),
                    ListView.builder(
                      shrinkWrap: true,
                      physics: const NeverScrollableScrollPhysics(),
                      itemCount: controller.doctor.value.jadwal.length,
                      itemBuilder: (context, index) {
                        var schedule = controller.doctor.value.jadwal[index];
                        return Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Row(
                              mainAxisAlignment: MainAxisAlignment.spaceBetween,
                              children: [
                                Text(
                                  "${schedule.hari}:",
                                  style: const TextStyle(
                                      fontSize: 16, color: Colors.black54),
                                ),
                                Text(
                                  "${schedule.startTime} WIB - ${schedule.endTime} WIB",
                                  style: const TextStyle(
                                      fontSize: 16,
                                      fontWeight: FontWeight.w500),
                                ),
                              ],
                            ),
                            const SizedBox(height: 5),
                          ],
                        );
                      },
                    ),
                  ],
                );
              }),
            ),
          ),
          Align(
            alignment: Alignment.bottomCenter,
            child: Container(
              padding: const EdgeInsets.symmetric(horizontal: 24, vertical: 16),
              width: Get.width,
              child: ElevatedButton(
                onPressed: () {
                  // Tambahkan logika untuk membuat janji temu
                },
                style: ElevatedButton.styleFrom(
                  backgroundColor: const Color(0xFF16A085),
                  foregroundColor: Colors.white,
                  padding: const EdgeInsets.symmetric(vertical: 15),
                ),
                child: const Text(
                  'Buat Janji Temu',
                  style: TextStyle(fontSize: 16),
                ),
              ),
            ),
          ),
          const SizedBox(height: 10)
        ],
      ),
    );
  }
}
