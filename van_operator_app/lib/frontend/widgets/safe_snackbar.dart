import 'package:flutter/material.dart';

void showSafeSnackBar(
  BuildContext context,
  String message, {
  Color backgroundColor = Colors.black87,
  Duration duration = const Duration(seconds: 3),
  SnackBarAction? action,
}) {
  if (!context.mounted) return;

  ScaffoldMessenger.of(context).showSnackBar(
    SnackBar(
      content: Text(message),
      backgroundColor: backgroundColor,
      duration: duration,
      action: action,
    ),
  );
}
