import 'package:flutter/material.dart';

import 'package:get/get.dart';
import 'package:outpatient_mobile/app/routes/app_pages.dart';

import '../controllers/doctor_controller.dart';

class DoctorView extends GetView<DoctorController> {
  const DoctorView({super.key});

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
              'Daftar Dokter',
              style: TextStyle(fontSize: 16),
            ),
            centerTitle: true,
            shadowColor: Colors.black,
          ),
        ),
      ),
      body: Padding(
        padding: const EdgeInsets.symmetric(horizontal: 16.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Container(
              margin: const EdgeInsets.only(top: 16),
              child: TextField(
                onChanged: (value) {
                  controller.searchText.value = value;
                },
                decoration: InputDecoration(
                  hintText: 'Enter search term',
                  prefixIcon: const Icon(Icons.search),
                  suffixIcon: Obx(() {
                    return controller.searchText.value.isNotEmpty
                        ? IconButton(
                            icon: const Icon(Icons.clear),
                            onPressed: () {
                              controller.searchText.value = '';
                              controller.searchResults.clear();
                            },
                          )
                        : Container();
                  }),
                  border: OutlineInputBorder(
                    borderRadius: BorderRadius.circular(8.0),
                    borderSide: BorderSide.none,
                  ),
                  filled: true,
                  fillColor: Colors.grey[200],
                ),
              ),
            ),
            CategoryScroll(),
            Obx(() {
              return Text(
                "Dokter Ditemukan (${controller.filteredDoctors.length})",
                style:
                    const TextStyle(fontSize: 12, fontWeight: FontWeight.w500),
              );
            }),
            const SizedBox(height: 5),
            Expanded(
              child: Obx(() {
                if (controller.isLoading.value) {
                  return const Center(
                    child: CircularProgressIndicator(
                        backgroundColor: Color(0xFF16A085),
                        valueColor:
                            AlwaysStoppedAnimation<Color>(Colors.white)),
                  );
                }
                if (controller.filteredDoctors.isEmpty) {
                  return const Center(child: Text('No doctors available'));
                }
                return ListView.builder(
                    itemCount: controller.filteredDoctors.length,
                    itemBuilder: (context, index) {
                      var doctor = controller.filteredDoctors[index];
                      return InkWell(
                          onTap: () => {
                                Get.toNamed(Routes.DOCTOR_DETAIL,
                                    arguments: doctor.id)
                              },
                          child: Container(
                            padding: const EdgeInsets.symmetric(
                                vertical: 10, horizontal: 5),
                            child: Column(
                              children: [
                                Row(
                                  crossAxisAlignment: CrossAxisAlignment.center,
                                  mainAxisAlignment:
                                      MainAxisAlignment.spaceBetween,
                                  children: [
                                    Row(
                                      children: [
                                        Container(
                                          width: 65,
                                          height: 65,
                                          margin:
                                              const EdgeInsets.only(right: 17),
                                          decoration: BoxDecoration(
                                            shape: BoxShape.rectangle,
                                            borderRadius:
                                                BorderRadius.circular(5),
                                          ),
                                          child: ClipRRect(
                                            borderRadius:
                                                BorderRadius.circular(5),
                                            child: Image.network(
                                              "https://allowing-eagle-moral.ngrok-free.app/uploads/dokter/${doctor.foto}",
                                              fit: BoxFit.cover,
                                            ),
                                          ),
                                        ),
                                        Column(
                                          crossAxisAlignment:
                                              CrossAxisAlignment.start,
                                          mainAxisAlignment:
                                              MainAxisAlignment.center,
                                          children: [
                                            Text(
                                              doctor.nama,
                                              style: const TextStyle(
                                                fontSize: 16,
                                                fontWeight: FontWeight.bold,
                                              ),
                                            ),
                                            Text(
                                              doctor.spesialisasi,
                                              style: const TextStyle(
                                                  fontSize: 10,
                                                  color: Colors.blueGrey),
                                            ),
                                            SizedBox(height: 10),
                                            Row(
                                              mainAxisAlignment:
                                                  MainAxisAlignment
                                                      .spaceBetween,
                                              children: [
                                                Container(
                                                  margin: EdgeInsets.only(
                                                      right: 10),
                                                  child: Row(
                                                    children: [
                                                      const Icon(
                                                        Icons.local_hospital,
                                                        size: 14,
                                                        color: Colors.blue,
                                                      ),
                                                      const SizedBox(width: 5),
                                                      Text(
                                                        doctor.poli.nama,
                                                        style: const TextStyle(
                                                          fontSize: 12,
                                                          color: Colors.blue,
                                                        ),
                                                      ),
                                                    ],
                                                  ),
                                                ),
                                                Container(
                                                  margin: EdgeInsets.only(
                                                      right: 10),
                                                  child: const Row(
                                                    children: [
                                                      Icon(Icons.check_circle,
                                                          size: 14,
                                                          color: Colors.green),
                                                      SizedBox(width: 5),
                                                      Text(
                                                        "Online",
                                                        style: TextStyle(
                                                            fontSize: 12,
                                                            color:
                                                                Colors.green),
                                                      ),
                                                    ],
                                                  ),
                                                ),
                                              ],
                                            ),
                                          ],
                                        ),
                                      ],
                                    ),
                                    const Icon(
                                      Icons.favorite_outline_rounded,
                                      size: 27,
                                      color: Colors.blueGrey,
                                    )
                                  ],
                                ),
                                const SizedBox(height: 3),
                                Row(
                                  mainAxisAlignment: MainAxisAlignment.end,
                                  children: [
                                    SizedBox(
                                      width: Get.width - 120,
                                      child: ElevatedButton(
                                          onPressed: () {
                                            // if (_formKey.currentState!.validate()) {
                                            //   controller.updateProfile();
                                            // }
                                          },
                                          style: ElevatedButton.styleFrom(
                                              backgroundColor:
                                                  const Color(0xFF16A085),
                                              foregroundColor: Colors.white,
                                              padding:
                                                  const EdgeInsets.symmetric(
                                                      horizontal: 30),
                                              shape: RoundedRectangleBorder(
                                                  borderRadius:
                                                      BorderRadius.circular(
                                                          7))),
                                          child: Obx(() {
                                            return controller.isLoading.value
                                                ? const SizedBox(
                                                    width: 10,
                                                    height: 10,
                                                    child:
                                                        CircularProgressIndicator(
                                                      color: Colors.white,
                                                    ),
                                                  )
                                                : const Text(
                                                    'Buat Janji Temu',
                                                    style:
                                                        TextStyle(fontSize: 10),
                                                  );
                                          })),
                                    ),
                                  ],
                                ),
                              ],
                            ),
                          ));
                    });
              }),
            ),
          ],
        ),
      ),
    );
  }
}

class CategoryScroll extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    final controller = Get.find<DoctorController>();
    return Obx(() {
      if (controller.isLoading.value) {
        return const Center(
          child: CircularProgressIndicator(
              backgroundColor: Color(0xFF16A085),
              valueColor: AlwaysStoppedAnimation<Color>(Colors.white)),
        );
      }
      if (controller.polis.isEmpty) {
        return const Center(child: Text('No categories available'));
      }
      return Container(
        margin: const EdgeInsets.symmetric(vertical: 10),
        height: 50,
        child: SingleChildScrollView(
          scrollDirection: Axis.horizontal,
          child: Row(
            children: controller.polis.map((poli) {
              return Obx(() {
                bool isSelected =
                    controller.selectedCategory.value == poli.nama;
                return GestureDetector(
                  onTap: () {
                    controller.selectedCategory.value = poli.nama;
                    // Tambahkan logika untuk memfilter daftar dokter berdasarkan kategori yang dipilih
                  },
                  child: Container(
                    margin: const EdgeInsets.symmetric(horizontal: 5),
                    padding:
                        const EdgeInsets.symmetric(horizontal: 10, vertical: 5),
                    decoration: BoxDecoration(
                      color: isSelected
                          ? const Color(0xFF16A085)
                          : Colors.grey[200],
                      borderRadius: BorderRadius.circular(20),
                      // border: Border.all(color: Colors.blueAccent),
                    ),
                    child: Row(
                      children: [
                        Icon(
                          Icons.category,
                          color: isSelected ? Colors.white : Colors.black54,
                          size: 16,
                        ),
                        SizedBox(width: 5),
                        Text(
                          poli.nama,
                          style: TextStyle(
                            color: isSelected ? Colors.white : Colors.black54,
                            fontSize: 14,
                          ),
                        ),
                      ],
                    ),
                  ),
                );
              });
            }).toList(),
          ),
        ),
      );
    });
  }
}
