import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';

Widget profileOption({
  required IconData icon,
  required String title,
  required Color iconColor,
  VoidCallback? onTap,
}) {
  return ListTile(
    onTap: onTap,
    leading: Container(
      padding: const EdgeInsets.all(8),
      decoration: BoxDecoration(
        color: iconColor.withOpacity(0.1),
        borderRadius: BorderRadius.circular(8),
      ),
      child: Icon(icon, color: iconColor, size: 20),
    ),
    title: Text(
      title,
      style: GoogleFonts.poppins(fontSize: 16, fontWeight: FontWeight.w500),
    ),
    trailing: const Icon(Icons.arrow_forward_ios, size: 16, color: Colors.grey),
  );
}
