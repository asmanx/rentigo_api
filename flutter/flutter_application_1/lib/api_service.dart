import 'dart:convert';

import 'package:http/http.dart' as http;

import 'mobil.dart';

class ApiService {
  static const String baseUrl = 'http://127.0.0.1:8000/api';

  Future<List<Mobil>> getMobils() async {
    final response = await http.get(Uri.parse('$baseUrl/mobil'));

    if (response.statusCode == 200) {
      final List<dynamic> data = jsonDecode(response.body);

      return data.map((item) => Mobil.fromJson(item)).toList();
    } else {
      throw Exception('Gagal mengambil data mobil');
    }
  }
}
